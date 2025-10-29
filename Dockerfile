# Use official PHP image with Apache
FROM php:8.2-apache

# Copy all files into the web root
COPY . /var/www/html/

# Expose port 80 for Render
EXPOSE 80

# Enable Apache rewrite module (not required but good practice)
RUN a2enmod rewrite
