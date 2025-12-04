#!/usr/bin/env bash
set -e

# cria arquivo sqlite se necessário
if [ "${DB_CONNECTION:-}" = "sqlite" ]; then
  DB_FILE="${DB_DATABASE:-/var/www/database/database.sqlite}"
  mkdir -p "$(dirname "$DB_FILE")"
  if [ ! -f "$DB_FILE" ]; then
    touch "$DB_FILE"
    chmod 0664 "$DB_FILE" || true
    chown www-data:www-data "$DB_FILE" 2>/dev/null || true
  fi
fi

# prepara app (migrations, storage link, cache opcional)
php artisan migrate --force || true
php artisan storage:link || true

# executa o comando padrão do Docker (php-fpm)
exec "$@"