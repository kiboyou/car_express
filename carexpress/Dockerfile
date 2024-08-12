# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip


# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql gd mbstring

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer Node.js et npm (si vous utilisez Laravel Mix ou TailwindCSS)
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs


# Configurer Apache
RUN a2enmod rewrite

# Copier le code source du projet dans le conteneur
COPY . /var/www/html

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
# Set working directory
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chmod -R 755 /var/www/html/storage
RUN chmod -R 755 /var/www/html/bootstrap/cache

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Installer les dépendances PHP
RUN composer install --optimize-autoloader --no-dev

# Configurer l'environnement
RUN cp .env.example .env \
    && php artisan key:generate

# Copy Apache configuration file
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Exposer le port 80
EXPOSE 80

CMD ["apache2-foreground"]
