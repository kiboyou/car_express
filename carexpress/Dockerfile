# Utilisez l'image officielle PHP avec PHP-FPM
FROM php:8.2-fpm

# Installez les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql

# Installez Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Définissez le répertoire de travail
WORKDIR /var/www/html

# Copiez les fichiers du projet Laravel
COPY . .

# Installez les dépendances de Laravel
RUN composer install

# Assurez-vous que les permissions sont correctes pour les dossiers de stockage et de cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposez le port 9000 pour PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
