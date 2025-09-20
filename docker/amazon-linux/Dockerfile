FROM amazonlinux:2023

# 設定
ENV TZ=Asia/Tokyo \
    ROOT=/var/www/lucidia \
    APP_ROOT=/var/www/lucidia/src

WORKDIR $ROOT

# PHP と必要拡張のインストール
RUN dnf update -y \
    && dnf install -y \
    nginx \
    php8.3-fpm \
    php8.3 \
    php8.3-pdo \
    php8.3-mysqlnd \
    php8.3-gd \
    php8.3-bcmath \
    php8.3-zip \
    php8.3-mbstring \
    php8.3-opcache \
    php8.3-intl \
    php8.3-xml \
    php8.3-soap \
    git \
    && dnf clean all

# Composer インストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node.js インストール
RUN curl -sL https://rpm.nodesource.com/setup_20.x | bash - \
    && dnf install -y nodejs \
    && node -v \
    && npm -v

# PHP-FPM 用ディレクトリ作成
RUN mkdir -p /run/php-fpm

# nginx 設定
COPY default.conf /etc/nginx/conf.d/default.conf

# ポート
EXPOSE 80

# PHP-FPM + nginx 起動
CMD ["/bin/sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
