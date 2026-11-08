FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip libzip-dev libonig-dev \
    && docker-php-ext-install mbstring zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    SESSION_DRIVER=file \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync \
    DB_CONNECTION=sqlite \
    DB_DATABASE=/var/www/html/database/database.sqlite

RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -ri 's/<VirtualHost \*:80>/<VirtualHost *:10000>/' /etc/apache2/sites-available/000-default.conf \
    && sed -ri 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf \
    && printf '\n<Directory /var/www/html/public>\nOptions FollowSymLinks\nAllowOverride All\nRequire all granted\nDirectoryIndex index.php\n</Directory>\n' >> /etc/apache2/apache2.conf \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 10000

CMD ["bash", "-lc", "mkdir -p database && if [ ! -f \"$DB_DATABASE\" ]; then touch \"$DB_DATABASE\" && chown www-data:www-data \"$DB_DATABASE\" && php artisan migrate --force && php artisan db:seed --force; else php artisan migrate --force; fi && chown -R www-data:www-data database storage bootstrap/cache && exec apache2-foreground"]