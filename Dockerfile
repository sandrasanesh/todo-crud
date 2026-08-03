FROM php:8.2-cli-bookworm

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends git libpq-dev unzip \
    && docker-php-ext-install pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
COPY artisan ./
COPY bootstrap/ ./bootstrap/
COPY config/ ./config/
COPY app/ ./app/
COPY routes/ ./routes/
COPY database/ ./database/
COPY resources/ ./resources/
COPY public/ ./public/
COPY storage/ ./storage/

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY . .

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}