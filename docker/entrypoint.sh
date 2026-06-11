#!/bin/sh


set -e

echo "🚀 Laravel entrypoint starting..."

# Validar APP_KEY
if [ -z "$APP_KEY" ]; then
  echo "❌ APP_KEY no definida"
  exit 1
fi

mkdir -p storage/framework/sessions \
         storage/framework/cache \
         storage/framework/views
		 
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Limpiar caches viejos
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Cachear config en producción
php artisan config:cache
php artisan route:cache

echo "✅ Laravel ready"

exec "$@"
