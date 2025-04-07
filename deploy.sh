# Update package lists
sudo apt update

# Install minimal production requirements
sudo apt install -y curl ca-certificates git unzip \
                    apache2 libapache2-mod-php8.3 \
                    mariadb-server mariadb-client v

# Add PHP repository
sudo mkdir -p /etc/apt/keyrings
curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | sudo gpg --dearmor | sudo tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null
echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu noble main" | sudo tee /etc/apt/sources.list.d/ppa_ondrej_php.list
sudo apt update

# Install Apache and PHP 8.3 with Apache module
sudo apt install -y apache2 libapache2-mod-php8.3 php8.3-cli php8.3-dev \
  php8.3-pgsql php8.3-sqlite3 php8.3-gd \
  php8.3-curl php8.3-imap php8.3-mysql php8.3-mbstring \
  php8.3-xml php8.3-zip php8.3-bcmath php8.3-soap \
  php8.3-intl php8.3-readline php8.3-ldap \
  php8.3-msgpack php8.3-igbinary php8.3-redis \
  php8.3-memcached php8.3-pcov php8.3-imagick php8.3-xdebug

# Install Composer
curl -sLS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/bin/ --filename=composer

# Install MariaDB
sudo apt install -y mariadb-server mariadb-client


# Enable required Apache modules
sudo a2enmod rewrite
sudo a2enmod headers
sudo a2enmod ssl
sudo systemctl restart apache2

# Install Certbot for SSL certificates
sudo apt install -y certbot python3-certbot-apache

# Create Laravel project in Apache web directory
sudo vim /etc/group
# www-data:x:33:ubuntu
sudo mkdir /var/vhost/kura
sudo chown www-data:www-data /var/vhost/kura
cd /var/vhost/kura

# Set proper permissions
sudo chown -R www-data:www-data /var/vhost/kura
sudo chmod -R 775 /var/vhost/kura

# Configure Apache virtual host for HTTP (will redirect to HTTPS)
sudo tee /etc/apache2/sites-available/kura.conf > /dev/null <<EOF
<VirtualHost *:80>
    ServerName kura.aeyia.com
    ServerAlias dev.aeyia.com
    DocumentRoot /var/vhost/kura/public

    # For Certbot validation
    <Directory /var/vhost/kura/public>
        AllowOverride All
        Require all granted
    </Directory>

    # Redirect all HTTP to HTTPS
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

# Create SSL virtual host configuration
sudo tee /etc/apache2/sites-available/kura-ssl.conf > /dev/null <<EOF
<VirtualHost *:443>
    ServerName kura.aeyia.com
    ServerAlias dev.aeyia.com
    DocumentRoot /var/vhost/kura/public

    <Directory /var/vhost/kura/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined

    # SSL Configuration
    SSLEngine on
    # SSLCertificateFile /etc/letsencrypt/live/dev.aeyia.com/fullchain.pem
    # SSLCertificateKeyFile /etc/letsencrypt/live/dev.aeyia.com/privkey.pem
    # Include /etc/letsencrypt/options-ssl-apache.conf
</VirtualHost>
EOF

# Enable the sites and disable the default
sudo a2ensite kura.conf
sudo a2ensite kura-ssl.conf
sudo a2dissite 000-default.conf

# Obtain SSL certificate for dev.aeyia.com
sudo certbot --apache -d dev.aeyia.com --non-interactive --agree-tos --email tech@aeyia.com

# Reload Apache to apply changes
sudo systemctl reload apache2

# # Configure MariaDB for Laravel
# sudo mysql -e "CREATE DATABASE laravel_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
# sudo mysql -e "CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'your_password';"
# sudo mysql -e "GRANT ALL PRIVILEGES ON laravel_db.* TO 'laravel_user'@'localhost';"
# sudo mysql -e "FLUSH PRIVILEGES;"

# # Update Laravel .env file with database credentials
# cd /var/vhost/kura
# sudo sed -i 's/DB_DATABASE=laravel/DB_DATABASE=laravel_db/' .env
# sudo sed -i 's/DB_USERNAME=root/DB_USERNAME=laravel_user/' .env
# sudo sed -i 's/DB_PASSWORD=/DB_PASSWORD=your_password/' .env