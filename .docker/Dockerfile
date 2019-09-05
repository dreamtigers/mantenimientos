FROM php:7.2-apache

RUN apt-get update && apt-get install -y --no-install-recommends git unzip \
	libxml2-dev \
    libjpeg62-turbo-dev libpng-dev\
    nodejs npm

WORKDIR /srv
RUN curl --silent --show-error https://getcomposer.org/installer | php

RUN docker-php-ext-install bcmath ctype json mbstring pdo tokenizer xml \
    pdo_mysql

RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ && docker-php-ext-install gd

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

COPY . /srv/app

RUN a2enmod rewrite
