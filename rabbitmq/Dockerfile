FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip

RUN docker-php-ext-install sockets

WORKDIR /app

COPY composer.json composer.lock /app/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /app/

RUN composer dump-autoload --optimize
COPY composer.json composer.lock /app/

CMD ["tail", "-f", "/dev/null"]