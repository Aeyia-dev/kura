#!/bin/bash
# Script to install Certbot and create SSL certificate for kura.aeyia.com

# Install Certbot and Apache plugin
sudo apt update
sudo apt install -y certbot python3-certbot-apache

# Make sure Apache is running
sudo systemctl is-active --quiet apache2 || sudo systemctl start apache2

# Ensure virtual host exists for the domain
if [ ! -f /etc/apache2/sites-available/kura.aeyia.com.conf ]; then
  # Create a basic virtual host if it doesn't exist
  sudo tee /etc/apache2/sites-available/kura.aeyia.com.conf > /dev/null <<EOF
<VirtualHost *:80>
    ServerName kura.aeyia.com
    DocumentRoot /var/www/html/kura
    
    <Directory /var/www/html/kura>
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog \${APACHE_LOG_DIR}/kura_error.log
    CustomLog \${APACHE_LOG_DIR}/kura_access.log combined
</VirtualHost>
EOF

  # Create the document root if it doesn't exist
  sudo mkdir -p /var/www/html/kura
  sudo chown -R www-data:www-data /var/www/html/kura
  
  # Enable the site
  sudo a2ensite kura.aeyia.com.conf
  sudo systemctl reload apache2
fi

# Request and install the SSL certificate
sudo certbot --apache -d kura.aeyia.com --non-interactive --agree-tos --email your-email@example.com

# Set up auto-renewal cron job (Certbot should do this automatically, but just to be sure)
echo "0 3 * * * root certbot renew --quiet" | sudo tee -a /etc/crontab > /dev/null

echo "SSL certificate for kura.aeyia.com has been set up successfully!"
echo "Certificate will auto-renew before expiration."