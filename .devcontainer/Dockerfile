# Dockerfile
FROM php:7.4-apache

RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
RUN apt-get update -y\
    && apt-get install -y git

WORKDIR /var/www
