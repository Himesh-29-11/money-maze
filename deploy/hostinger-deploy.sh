#!/usr/bin/env bash
# Money Maze — first-time deploy on Hostinger Cloud VPS (Ubuntu 24.04)
# Run on the server as a user with sudo, from the project root:
#   bash deploy/hostinger-deploy.sh
set -euo pipefail

APP_DIR="${APP_DIR:-/var/www/money-maze}"
DOMAIN="${DOMAIN:-your-domain.com}"

echo "==> Deploying Money Maze to ${APP_DIR}"

cd "$APP_DIR"

# PHP dependencies (production only)
composer install --no-dev --optimize-autoloader --no-interaction

# Frontend assets (requires Node.js on server, or build locally and upload public/build/)
if command -v npm >/dev/null 2>&1; then
  npm ci
  npm run build
else
  echo "WARN: npm not found — upload public/build/ from your local machine if missing."
fi

# Environment
if [ ! -f .env ]; then
  cp .env.example .env
  php artisan key:generate --force
  echo "Created .env — edit APP_URL, DB_*, ADMIN_PASSWORD, then re-run migrations."
fi

# Storage & cache directories
mkdir -p storage/framework/{cache/data,sessions,views,testing} storage/logs bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Database (SQLite default — switch .env to mysql for production MySQL)
if grep -q '^DB_CONNECTION=sqlite' .env 2>/dev/null; then
  mkdir -p database
  touch database/database.sqlite
fi

php artisan migrate --force --no-interaction
php artisan db:seed --force --no-interaction || true

# Production caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Done. Point Nginx root to ${APP_DIR}/public and set APP_ENV=production APP_DEBUG=false in .env"
