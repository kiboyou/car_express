FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Copy application files
COPY . /var/www/html

# Set working directory
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chmod -R 755 /var/www/html/storage
RUN chmod -R 755 /var/www/html/bootstrap/cache



# Copy Apache configuration file
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf


# Enable Apache modules
RUN a2enmod rewrite

# Exposer le port 80
EXPOSE 80

# Commande par défaut
CMD ["apache2-foreground"]