FROM php:8.0-rc-apache-buster

ENV TZ Asia/Tokyo

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN  apt-get update && \
     apt-get install -y git unzip libzip-dev libonig-dev && \
     apt-get install -y libicu-dev libpng-dev && \
     docker-php-ext-install intl pdo_mysql zip bcmath && \
     docker-php-ext-install gd  && \
     cd /etc/apache2/mods-enabled && \
     ln -s ../mods-available/rewrite.load
     

COPY ./infra/docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./infra/docker/apache/httpd.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html