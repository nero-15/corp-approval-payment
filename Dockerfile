# syntax=docker/dockerfile:1

FROM php:8.2.3-apache

ENV ROOT=/var/www/html
WORKDIR ${ROOT}

# composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

# git install
RUN apt-get update && apt-get install git-all