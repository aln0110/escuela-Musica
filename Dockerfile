# Use an official PHP runtime as a parent image
FROM php:8.3-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the local PHP project files to the container
COPY . /var/www/html

# Install any PHP extensions or dependencies required by your project
RUN docker-php-ext-install mysqli

# Optional: Ensure the correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to access the web server
EXPOSE 80
