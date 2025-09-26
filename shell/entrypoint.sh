#!/bin/sh
set -e

# 初回起動処理
if [ ! -f /var/www/lucidia/src/.env ]; then
    cp /var/www/lucidia/src/.env.example /var/www/lucidia/src/.env
    php artisan key:generate
    php artisan migrate --seed
fi

# 毎回起動処理
php-fpm -D
exec "$@"