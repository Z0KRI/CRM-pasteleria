FROM php:8.2-cli

RUN apt-get update && \
    apt-get install -y \
    git \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./service /var/www/html

WORKDIR /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 8000