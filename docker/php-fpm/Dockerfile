FROM php:8.2-fpm-alpine

WORKDIR "/application"

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
RUN apk add --no-cache rabbitmq-c-dev \
    && pecl install amqp \
    && docker-php-ext-enable amqp
RUN apk add --no-cache --update linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache graphviz

RUN apk add --no-cache git
RUN apk add --no-cache vim

RUN docker-php-ext-install intl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install opcache
#RUN docker-php-ext-install zip
RUN docker-php-ext-install gmp
RUN docker-php-ext-install pcntl

# mysql
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

COPY docker/php-fpm/php-ini-overrides.ini /usr/local/etc/php-fpm/conf.d/php-overrides.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN apk update && apk add --no-cache nodejs npm