#!/bin/bash
set -e

# Check if .env file exists and source it
if [ -f .env ]; then
    source .env
else
    echo "Error: .env file not found in current directory"
    echo "Please create an .env file with required configuration settings"
    exit 1
fi

# Required variables check
required_vars=("DB_DATABASE" "DB_USERNAME" "DB_PASSWORD" "APP_URL" "EMAIL_ADDRESS")
for var in "${required_vars[@]}"; do
    if [ -z "${!var}" ]; then
        echo "Error: Required environment variable $var is not set in .env"
        exit 1
    fi
done

# Update package lists
sudo apt update

# Install minimal production requirements
sudo apt install -y curl ca-certificates git unzip \
                    apache2 mariadb-server mariadb-client

# Add PHP repository
sudo mkdir -p /etc/apt/keyrings
curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | sudo gpg --dearmor | sudo tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null
echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu noble main" | sudo tee /etc/apt/sources.list.d/ppa_ondrej_php.list
sudo apt update

# Install Apache and PHP 8.3 with Apache module and required extensions
sudo apt install -y apache2 libapache2-mod-php8.3 php8.3-cli php8.3-dev \
  php8.3-pgsql php8.3-sqlite3 php8.3-gd \
  php8.3-curl php8.3-imap php8.3-mysql php8.3-mbstring \
  php8.3-xml php8.3-zip php8.3-bcmath php8.3-soap \
  php8.3-intl php8.3-readline php8.3-ldap \
  php8.3-msgpack php8.3-igbinary php8.3-redis \
  php8.3-memcached php8.3-pcov php8.3-imagick

# Install Composer
curl -sLS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/bin/ --filename=composer

# Install Node.js and npm
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
# Verify npm installation
npm -v

# Enable required Apache modules
sudo a2enmod rewrite
sudo a2enmod headers
sudo a2enmod ssl
sudo systemctl restart apache2

# Install Certbot for SSL certificates
sudo apt install -y certbot python3-certbot-apache

# Create web directory in Apache web directory
sudo mkdir -p /var/vhost/kura
sudo chown -R www-data:www-data /var/vhost/kura
# Add ubuntu user to www-data group for file permissions
sudo usermod -aG www-data ubuntu
sudo chmod -R 775 /var/vhost/kura

# Clone the repository
cd /var/vhost
sudo -u www-data git clone ${GIT_REPO:-https://github.com/aeyia/kura.git} || (cd /var/vhost/kura && sudo -u www-data git pull)

# Copy Apache configuration files
sudo cp /var/vhost/kura/provisioning/prod.conf /etc/apache2/sites-available/kura-ssl.conf

# Configure Apache virtual host for HTTP (will redirect to HTTPS)
DOMAIN_NAME=${DOMAIN_NAME:-dev.aeyia.com}
sudo tee /etc/apache2/sites-available/kura.conf > /dev/null <<EOF
<VirtualHost *:80>
    ServerName kura.aeyia.com
    ServerAlias ${DOMAIN_NAME}

    # Redirect all HTTP to HTTPS
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

# Enable the sites and disable the default
sudo a2ensite kura.conf
sudo a2ensite kura-ssl.conf
sudo a2dissite 000-default.conf

# Obtain SSL certificate for domain
sudo certbot --apache -d ${DOMAIN_NAME} --non-interactive --agree-tos --email ${EMAIL_ADDRESS:-tech@aeyia.com}

# Reload Apache to apply changes
sudo systemctl reload apache2

# Configure MariaDB for Laravel
sudo mysql -e "CREATE DATABASE IF NOT EXISTS ${DB_DATABASE} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
sudo mysql -e "CREATE USER IF NOT EXISTS '${DB_USERNAME}'@'localhost' IDENTIFIED BY '${DB_PASSWORD}';"
sudo mysql -e "GRANT ALL PRIVILEGES ON ${DB_DATABASE}.* TO '${DB_USERNAME}'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# Set up Laravel application
cd /var/vhost/kura/web

# Copy .env file and set the key
sudo -u www-data cp .env.example .env
sudo -u www-data php artisan key:generate

# Install Composer dependencies
sudo -u www-data composer install --no-dev --optimize-autoloader

# Install npm dependencies and build assets
npm ci
npm run build

# Run database migrations
php artisan migrate --force

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Set proper permissions for storage and cache
sudo chmod -R 775 /var/vhost/kura/web/storage
sudo chmod -R 775 /var/vhost/kura/web/bootstrap/cache

# Set up scheduled tasks
(sudo crontab -l 2>/dev/null; echo "* * * * * cd /var/vhost/kura/web && php artisan schedule:run >> /dev/null 2>&1") | sudo crontab -

echo "Deployment complete! The application should be available at https://${DOMAIN_NAME}"