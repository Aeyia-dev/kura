#!/bin/bash
set +e
git branch
git pull

if [ -f .env ]; then
    . .env
else
    echo "Error: .env file not found"
    exit 1
fi

echo "Deploying for $APP_ENV"

# Clear bootstrap cache BEFORE running composer to avoid dev service provider issues
echo "Clearing bootstrap cache..."
rm -f bootstrap/cache/*.php

# Now run composer install
if [ "$APP_ENV" = "local" ]; then
    echo "Running composer in non-production mode..."
    composer install
else
    echo "Running composer in production mode..."
    composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader
fi

# Clear all caches to ensure clean state
echo "Clearing all caches..."
sudo -u www-data php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Continue with migration and asset building
php artisan migrate
npm ci #--omit=dev
npm run build #--omit=dev

# Rebuild caches for production performance
echo "Rebuilding caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
# sudo chown -R www-data:ubuntu .
sudo service apache2 restart
# sudo service php8.3-fpm restart
