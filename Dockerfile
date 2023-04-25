FROM php:7.4-apache

# Install necessary PHP extensions
RUN docker-php-ext-install pdo_mysql

# Copy application files to container
COPY . /var/www/html

# Change ownership of files to www-data
RUN chown -R www-data:www-data /var/www/html

# Set document root to /var/www/html/public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
# Replaces the document root in the Apache configuration files with the value of the APACHE_DOCUMENT_ROOT environment variable.
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
# Restarts the Apache web server in the container to apply the configuration changes
RUN service apache2 restart