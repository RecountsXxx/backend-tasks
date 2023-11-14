FROM php:8.1.2-fpm

RUN apt-get -y update && apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mysqli

COPY docker/php/conf.d/* $PHP_INI_DIR/conf.d/

CMD ["php-fpm"]

