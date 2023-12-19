FROM php:8.1.2-fpm

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

CMD ["php-fpm"]