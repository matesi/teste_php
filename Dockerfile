FROM php:8.2-fpm

WORKDIR /usr/src/download
SHELL ["/bin/bash", "-c"]
# ## install php, composer and laravel
RUN curl -fsSL https://php.new/install/linux
COPY ./server-php /usr/src/phpapp
WORKDIR /usr/src/phpapp
# ## install libraries php PGSQL PDO PDO_PGSQL
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pgsql pdo pdo_pgsql
SHELL ["/bin/bash", "-c"]
# RUN php artisan config:clear
# RUN php artisan cache:clear
RUN php artisan migrate --force
