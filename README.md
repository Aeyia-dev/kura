# Project Kura  `Japanese: small sturdy structure for valuable items "treasure house", Maori: school`

# AEYIA Web Tech Stack

This is the tech spike project for AEYIA's web platform. The project uses Laravel Sail for containerized development.

## Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Vue 3 + Inertia.js
- **CSS**: Tailwind CSS
- **Database**: MariaDB 11
- **Environment**: Laravel Sail (Docker)
- **Authentication**: Laravel Jetstream
- **Authorization**: Laravel Permissions (Spatie)
- **Search**: Meilisearch
- **Email Testing**: Mailpit
- **Storage**: MinIO (S3 compatible)
- **Monitoring**: Laravel Telescope (local dev only)

## Quick Start

### Prerequisites

- Docker & Docker Compose
- Composer
- Node.js & npm

### Setup Steps

1. **Clone the repository**

email tech@aeyia.com
github  https://github.com/aeyia-dev

```bash
git clone git@github.com-aeyia:Aeyia-dev/kura.git
cd kura/web
```

Set up

```sh
s ~/.ssh/config
    Host github.com-aeyia
      HostName github.com
      User git
      IdentityFile ~/.ssh/aeyia_ed25519
      IdentitiesOnly yes

git remote set-url origin git@github.com-aeyia:Aeyia-dev/kura.git
git remote -v
    origin  git@github.com-aeyia:Aeyia-dev/kura.git (fetch)
    origin  git@github.com-aeyia:Aeyia-dev/kura.git (push)

git push -u origin main
```

2. **Copy the environment file**

```bash
cp .env.example .env
```

3. **Install Composer dependencies using Sail**

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

4. **Start Docker containers**

```bash
./vendor/bin/sail up -d
```

5. **Generate application key**

```bash
./vendor/bin/sail artisan key:generate
```

6. **Run database migrations**

```bash
./vendor/bin/sail artisan migrate
```

7. **Install NPM dependencies and build assets**

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

### Access the Application

- **Main site**: [http://localhost:9090](http://localhost:9090)
- **Mailpit (email testing)**: [http://localhost:8129](http://localhost:8129)
- **Adminer (database admin)**: [http://localhost:9090/adminer.php](http://localhost:9090/adminer.php)
- **Meilisearch**: [http://localhost:7709](http://localhost:7709)
- **MinIO Console**: [http://localhost:8909](http://localhost:8909) (User: sail / Password: password)

## Deploy Envs

Public key `ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIH55IprbJ9DkYF0nu6uPRjziGROjlFUaYrmv315sFEey tech@aeyia.com`
ssh-add  ~/.ssh/aeyia_ed25519
ssh ubuntu@13.54.98.88
ssh ubuntu@dev.aeyia.com


### Common Commands

```bash
# Run Laravel tests
./vendor/bin/sail artisan test

# Style linting with Pint
./vendor/bin/sail artisan pint

# Start all services (server, queue, logs, vite)
./vendor/bin/sail composer dev

# Run frontend in development mode
./vendor/bin/sail npm run dev

# Build for production
./vendor/bin/sail npm run build

# Stop all containers
./vendor/bin/sail down
```

## Additional Resources

Check out the `CLAUDE.md` file in the root directory for more project-specific commands and guidelines.
