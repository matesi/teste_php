FROM php:8.2-fpm

# ## set working directory and shell type
WORKDIR /usr/src/download
SHELL ["/bin/bash", "-c"]

# ## install php, composer and laravel
RUN curl -fsSL https://php.new/install/linux
COPY ./server-php /usr/src/phpapp
WORKDIR /usr/src/phpapp

# ## install libraries php PGSQL PDO PDO_PGSQL
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pgsql pdo pdo_pgsql

# ## Copy file server-php/run.sh to /usr/src/phpapp/run.sh and set to executable in docker container
SHELL ["/bin/bash", "-c"]
COPY ./server-php/run.sh /usr/src/phpapp/run.sh
RUN chmod +x run.sh

# ## create docker user and set docker user as owner of run.sh
RUN useradd -G www-data,root -u 1000 -d /home/docker docker
RUN chown -R docker:docker /usr/src/phpapp/run.sh
USER docker

# ## set working directory and execute run.sh
WORKDIR /usr/src/phpapp
ENTRYPOINT ["./run.sh"]