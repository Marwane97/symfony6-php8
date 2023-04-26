FROM php:8.1-fpm-alpine

WORKDIR "/var/www/app"

RUN apk update

RUN apk add --no-cache $PHPIZE_DEPS
RUN apk add --no-cache zlib-dev
RUN apk add --no-cache libxml2-dev
RUN apk add --no-cache gmp-dev
RUN apk add --no-cache icu-dev zip
RUN apk add --no-cache zip
RUN apk add --no-cache libssh-dev
RUN apk add --no-cache bash
RUN apk add --no-cache openssh
RUN apk add --no-cache libmcrypt-dev
RUN apk add --no-cache libmemcached-dev
RUN apk add --no-cache git
RUN apk add --no-cache vim
RUN apk add --no-cache rabbitmq-c-dev

RUN docker-php-ext-install intl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install opcache
#RUN docker-php-ext-install zip
RUN docker-php-ext-install gmp
RUN docker-php-ext-install pcntl

# mysql
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

# RabbitMQ
RUN pecl install amqp
RUN echo extension=amqp.so >> /usr/local/etc/php/conf.d/amqp.ini

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN apk update && apk add --no-cache nodejs npm