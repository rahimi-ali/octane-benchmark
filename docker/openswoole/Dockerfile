FROM php:8.3

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN install-php-extensions pcntl sockets openswoole mbstring exif bcmath gd zip pdo_pgsql

COPY . /var/www

WORKDIR /var/www

ENTRYPOINT ["php", "artisan", "octane:start", "--server=swoole", "--port=9002", "--workers=4", "--host=0.0.0.0"]

EXPOSE 9002
