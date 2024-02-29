FROM php:8.3

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN install-php-extensions pcntl sockets mbstring exif bcmath gd zip pdo_pgsql

COPY . /var/www

WORKDIR /var/www

RUN apt update \
    && apt install -y curl jq \
    && rm -rf /var/lib/apt/lists/*

RUN curl -L -o /usr/local/bin/frankenphp "https://github.com/dunglas/frankenphp/releases/download/v1.1.0/frankenphp-linux-x86_64" && chmod +x /usr/local/bin/frankenphp

ENTRYPOINT ["php", "artisan", "octane:start", "--server=frankenphp", "--port=9004", "--workers=4", "--host=0.0.0.0"]

EXPOSE 9004
