# Base image
FROM php:8.1-apache

# Install MySQL extension
RUN docker-php-ext-install mysqli

# Copy project files to the container
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
