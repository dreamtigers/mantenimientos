FROM php:7.2-apache

RUN apt-get update && apt-get install -y --no-install-recommends git unzip \
	libxml2-dev

WORKDIR /srv
RUN curl --silent --show-error https://getcomposer.org/installer | php

# RUN docker-php-ext-install mbstring intl simplexml pdo pdo_mysql
RUN docker-php-ext-install bcmath ctype json mbstring pdo tokenizer xml \
	pdo_mysql

COPY . /srv/app
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /srv/app && a2enmod rewrite
