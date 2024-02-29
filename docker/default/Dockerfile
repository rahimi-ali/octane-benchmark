FROM php:8.3-fpm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN install-php-extensions pcntl mbstring exif bcmath gd zip pdo_pgsql

COPY . /var/www

WORKDIR /var/www

EXPOSE 9000
