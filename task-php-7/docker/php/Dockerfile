FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
	    libfreetype6-dev \
	    libjpeg62-turbo-dev \
	    libpng-dev \
	    libzip-dev \
	    zip \
	    unzip \
	    git \
	    && docker-php-ext-install pdo_mysql \
	    && docker-php-ext-install mysqli \
	    && docker-php-ext-install zip

RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev && \
    docker-php-ext-configure gd --with-jpeg --with-freetype && \
    docker-php-ext-install -j$(nproc) gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


CMD ["php-fpm"]