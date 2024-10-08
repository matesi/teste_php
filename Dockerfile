FROM php:8.3-fpm

# # Install Composer
# WORKDIR /usr/local/bin/composer
# RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
#     php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
#     php composer-setup.php \
#     php -r "unlink('composer-setup.php');"
WORKDIR /usr/src/download
SHELL ["/bin/bash", "-c"]
RUN curl -fsSL https://php.new/install/linux
COPY ./server-php /usr/src/phpapp
WORKDIR /usr/src/phpapp
# SHELL ["/bin/bash", "-c"]
# RUN php artisan migrate
