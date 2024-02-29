FROM php:8.3

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN install-php-extensions pcntl sockets mbstring exif bcmath gd zip pdo_pgsql

COPY . /var/www

WORKDIR /var/www

RUN apk add jq

RUN wget -O/usr/local/bin/frankenphp $(wget -O- https://api.github.com/repos/dunglas/frankenphp/releases/latest | jq '.assets[] | select(.name=="frankenphp-linux-x86_64") | .browser_download_url' -r) && chmod +x /usr/local/bin/frankenphp

ENTRYPOINT ["php", "artisan", "octane:start", "--server=frankenphp", "--port=9004", "--workers=4", "--host=0.0.0.0"]

EXPOSE 9004