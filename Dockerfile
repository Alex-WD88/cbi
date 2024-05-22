FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        libcurl4-openssl-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libonig-dev \
        libzip-dev \
    && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \
#    && pecl install xdebug \
#    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) curl iconv mbstring mysqli pdo_mysql zip gd

VOLUME /var/www/html

CMD ["php-fpm"]