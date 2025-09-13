FROM amazonlinux:2023

# setting
ENV TZ=Asia/Tokyo \
    ROOT=/var/www/lucidia \
    APP_ROOT=/var/www/lucidia/src

WORKDIR $ROOT

# php install
RUN dnf update \
    && dnf install -y nginx php8.3-fpm php8.3 php8.3-pdo php8.3-mysqlnd php8.3-gd git \
    && dnf clean all

# composer install
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# npm install
RUN curl -sL https://rpm.nodesource.com/setup_20.x | bash - && \
    dnf install -y nodejs && \
    node -v && npm -v

# create dir
RUN mkdir -p /run/php-fpm

# nginx
COPY default.conf /etc/nginx/conf.d/default.conf

# port
EXPOSE 80

# PHP-FPM nginx start
CMD ["/bin/sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]