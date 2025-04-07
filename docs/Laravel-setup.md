# Laravel Setup Configuration

This document outlines the technical configuration choices for our Laravel application, with supporting rationale for each decision.

## Setup Checklist

- ✅ Clone repository
- ✅ Copy `.env.example` to `.env` and update settings
- ✅ Start Docker containers with `sail up -d`
- ✅ Run `composer install` (or use `sail composer install` if Sail is already working)
- ✅ Generate application key with `php artisan key:generate` (or `sail artisan key:generate`)
- ✅ Run database migrations with `sail artisan migrate`
- [ ] Seed the database with `sail artisan db:seed`
- [ ] Install frontend dependencies with `sail npm install`
- [ ] Compile frontend assets with `sail npm run dev` or `sail npm run build`
- [ ] Create a symbolic link for storage with `sail artisan storage:link`
- [ ] Verify installation with `sail artisan about`

## Core Framework Selection

- **Laravel Version: 11.x**  
  Using the latest stable version to leverage the most recent performance improvements, security updates, and developer features. Laravel 11 offers significant performance optimizations and improved typing support.

- **Vue Version: 3**  
  Vue 3 provides better TypeScript integration, the Composition API for more maintainable component logic, and improved performance through a more efficient reactivity system and tree-shaking support.

## Setup Commands

### 1. Initial Laravel Installation

```bash
# Create new Laravel 11 project with Laravel Sail
curl -s "https://laravel.build/kura?with=mariadb,redis,mailpit,meilisearch,minio" | bash

# Navigate to project directory
cd kura

# Start Docker environment
./vendor/bin/sail up -d

# Generate application key
./vendor/bin/sail artisan key:generate
```

### 2. Authentication System - Jetstream with Inertia.js + Vue

```bash
# Install Jetstream with Inertia
./vendor/bin/sail composer require laravel/jetstream

# Install Jetstream with Inertia.js and Vue support
./vendor/bin/sail artisan jetstream:install inertia

# IMPORTANT NOTE: By default, Jetstream will install with Tailwind CSS
# We'll need to manually replace Tailwind with Bootstrap (see Frontend section)
```

### 3. Database Configuration - MariaDB

```bash
# MariaDB is already included in our Sail setup
# Configure .env file with MariaDB connection
DB_CONNECTION=mysql
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=kura
DB_USERNAME=sail
DB_PASSWORD=password

# Run migrations
./vendor/bin/sail artisan migrate
```

### 4. Role and Permission Management - Spatie Permissions

```bash
# Install Spatie Permissions package
./vendor/bin/sail composer require spatie/laravel-permission

# Publish the migrations
./vendor/bin/sail artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

# Run the migrations
./vendor/bin/sail artisan migrate
```

#### Create Role and Permission Seeder

```bash
# Create a seeder for roles and permissions
./vendor/bin/sail artisan make:seeder RolesAndPermissionsSeeder
```

Edit the `database/seeders/RolesAndPermissionsSeeder.php` file:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        // Add your application-specific permissions here
        $permissions = [
            // Client permissions
            'view profile',
            'edit profile',
            'book appointment',
            'cancel appointment',
            
            // Practitioner permissions
            'view clients',
            'view appointments',
            'manage availability',
            
            // Staff permissions
            'manage clients',
            'manage practitioners',
            'manage appointments',
            
            // Admin permissions
            'manage users',
            'manage roles',
            'view logs',
            'manage system settings',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $role = Role::create(['name' => 'client']);
        $role->givePermissionTo([
            'view profile',
            'edit profile',
            'book appointment',
            'cancel appointment',
        ]);

        $role = Role::create(['name' => 'practitioner']);
        $role->givePermissionTo([
            'view profile',
            'edit profile',
            'view clients',
            'view appointments',
            'manage availability',
        ]);

        $role = Role::create(['name' => 'staff']);
        $role->givePermissionTo([
            'view profile',
            'edit profile',
            'manage clients',
            'manage practitioners',
            'manage appointments',
        ]);

        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo(Permission::all());
    }
}
```

Run the seeder:

```bash
./vendor/bin/sail artisan db:seed --class=RolesAndPermissionsSeeder
```

### 5. Security Features

#### API Authentication - Laravel Sanctum

```bash
# Sanctum is included with Laravel 11 by default
# If not, install it with:
./vendor/bin/sail composer require laravel/sanctum

# Publish Sanctum configuration
./vendor/bin/sail artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# Run migrations
./vendor/bin/sail artisan migrate
```

#### Two-Factor Authentication - AWS SNS Integration

```bash
# Install AWS SDK
./vendor/bin/sail composer require aws/aws-sdk-php

# Create Two-Factor Authentication service
./vendor/bin/sail artisan make:provider TwoFactorAuthServiceProvider
```

Create AWS SNS configuration in `config/services.php`:

```php
'sns' => [
    'key' => env('AWS_ACCESS_KEY_ID'),
    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
],
```

Add the following environment variables to your `.env` file:

```
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_key
AWS_DEFAULT_REGION=your_preferred_region
```

#### Email Verification

```bash
# Email verification is included with Jetstream
# Ensure it's enabled in config/fortify.php:
'features' => [
    Features::registration(),
    Features::resetPasswords(),
    Features::emailVerification(),
    Features::updateProfileInformation(),
    Features::updatePasswords(),
    Features::twoFactorAuthentication([
        'confirmPassword' => true,
    ]),
],
```

Configure mail settings in `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 6. Frontend Tooling

#### Replace Tailwind with Bootstrap

```bash
# Remove Tailwind CSS dependencies
npm remove tailwindcss postcss autoprefixer

# Install Bootstrap
npm install bootstrap @popperjs/core sass

# Install Vue 3 and the Composition API
npm install vue@next @vitejs/plugin-vue
```

Update the `vite.config.js` file:

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
});
```

Create `resources/css/app.scss`:

```scss
// Import Bootstrap styles
@import 'bootstrap/scss/bootstrap';

// Custom styles
// Add your custom styles here
```

Update `resources/js/app.js`:

```javascript
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

// Import Bootstrap JS
import 'bootstrap';

// Import our main scss file
import '../css/app.scss';

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
```

#### Build and Compile Assets

```bash
# Install dependencies
npm install

# Run development server
npm run dev

# For production build
npm run build
```

### 7. Docker and Development Environment

The Laravel Sail environment with extended services was already set up in the initial installation step with:

```bash
curl -s "https://laravel.build/kura?with=mariadb,redis,mailpit,meilisearch,minio" | bash
```

This includes:
- MariaDB for database
- Redis for caching and queues
- Mailpit for local email testing (replacement for Mailhog)
- Meilisearch for advanced search capabilities
- MinIO for S3-compatible object storage

#### Additional Docker Configuration

To customize the Docker setup further:

```bash
# Publish Docker files for customization
./vendor/bin/sail artisan sail:publish
```

This will create a `docker` directory in your project root with configuration files you can modify.

#### Restricting External Port Bindings

By default, Laravel Sail exposes all service ports on the host machine, which can cause conflicts with locally installed services and create unnecessary security exposure. For production environments, we should only expose HTTPS (and potentially SSH) ports.

To secure your Laravel Sail environment:

1. Modify the `docker-compose.yml` file in your Laravel project directory:
   - Comment out or remove the port bindings for all supporting services (MariaDB, Redis, Meilisearch, Mailpit, MinIO)
   - Make sure the Laravel service only exposes essential ports (HTTP, HTTPS, SSH)

```yaml
# Example modifications to docker-compose.yml

# Laravel container - expose only necessary ports
laravel.test:
    # ... other configurations ...
    ports:
        - '${APP_PORT:-80}:80'
        - '${HTTPS_PORT:-443}:443'
        - '${SSH_PORT:-2222}:22'
        # Only include Vite port in development
        - '${VITE_PORT:-5173}:${VITE_PORT:-5173}'

# MariaDB - remove external port binding
mariadb:
    # ... other configurations ...
    # ports:
    #     - '${FORWARD_DB_PORT:-3306}:3306'

# Redis - remove external port binding
redis:
    # ... other configurations ...
    # ports:
    #     - '${FORWARD_REDIS_PORT:-6379}:6379'

# And so on for other services...
```

2. Restart Sail to apply the changes:

```bash
./vendor/bin/sail down
./vendor/bin/sail up -d
```

This configuration ensures that:
- Only the web application ports (HTTP/HTTPS) are exposed to the outside world
- SSH access is available if needed (on port 2222 by default)
- All other services (MariaDB, Redis, etc.) are only accessible within the Docker network
- You can still connect to the internal services through Laravel or through the Sail CLI:

```bash
# Connect to MariaDB
./vendor/bin/sail mysql

# Connect to Redis
./vendor/bin/sail redis

# Use other services via their internal network names
```

This approach improves security by minimizing the exposed attack surface.

## Deployment Strategy

[This section intentionally omitted as requested]