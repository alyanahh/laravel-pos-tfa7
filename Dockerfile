
FROM php:8.3-apache

# Install system dependencies and PHP extensions
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        unzip \
        libzip-dev \
        libonig-dev \
        libpq-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install \
        mbstring \
        zip \
        pdo_pgsql \
        gd \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set project directory
WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Production environment defaults
ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    SESSION_DRIVER=file \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync \
    FILESYSTEM_DISK=public \
    PORT=10000

# Install Laravel dependencies
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

# Configure Apache for Render
RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -ri 's/<VirtualHost \*:80>/<VirtualHost *:10000>/' /etc/apache2/sites-available/000-default.conf \
    && sed -ri 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf \
    && printf '\n<Directory /var/www/html/public>\nOptions FollowSymLinks\nAllowOverride All\nRequire all granted\nDirectoryIndex index.php\n</Directory>\n' >> /etc/apache2/apache2.conf \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Render HTTP port
EXPOSE 10000

# Run migrations and start Apache
CMD ["bash", "-lc", "set -e; php artisan migrate --force; php artisan storage:link || true; chown -R www-data:www-data storage bootstrap/cache; exec apache2-foreground"]
