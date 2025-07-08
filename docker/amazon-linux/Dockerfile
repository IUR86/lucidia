FROM amazonlinux:2023

# timezone
ENV TZ=Asia/Tokyo

# php install
RUN dnf update \
    && dnf install -y nginx php8.3-fpm php8.3 php8.3-pdo php8.3-mysqlnd git \
    && dnf clean all

# composer install
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# create dir
RUN mkdir -p /run/php-fpm

# nginx
COPY default.conf /etc/nginx/conf.d/default.conf

# port
EXPOSE 80

# PHP-FPM nginx start
CMD ["/bin/sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]