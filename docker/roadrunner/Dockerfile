FROM php:8.3

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY --from=ghcr.io/roadrunner-server/roadrunner:latest /usr/bin/rr /usr/local/bin/rr

RUN install-php-extensions pcntl sockets mbstring exif bcmath gd zip pdo_pgsql

COPY . /var/www

WORKDIR /var/www

ENTRYPOINT ["php", "artisan", "octane:start", "--server=roadrunner", "--port=9003", "--workers=4", "--host=0.0.0.0"]

EXPOSE 9003
