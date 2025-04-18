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

if [ "$APP_ENV" = "production" ]; then
    echo "Running composer in production mode..."
    composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader
else
    echo "Running composer in non-production mode..."
    composer install
fi

php artisan migrate
npm ci #--omit=dev
npm run build #--omit=dev
sudo -u www-data php artisan cache:clear
php artisan config:clear && php artisan route:clear && php artisan view:clear
php artisan config:cache && php artisan route:cache && php artisan view:cache
sudo service apache2 restart
