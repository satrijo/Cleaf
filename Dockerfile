FROM php:8.3-cli

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-enable zip \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli \
    && docker-php-ext-install exif \
    && docker-php-ext-enable exif \
    && docker-php-ext-install pcntl \
    && docker-php-ext-enable pcntl \
    && docker-php-ext-install bcmath\
    && docker-php-ext-enable bcmath \
    && docker-php-ext-install sockets \
    && docker-php-ext-enable sockets \
    && docker-php-ext-install intl \
    && docker-php-ext-enable intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-enable mbstring \
    && docker-php-ext-install gd \
    && docker-php-ext-enable gd \
    && docker-php-ext-install curl \
    && docker-php-ext-enable curl \
    && apt-get purge -y --auto-remove \
    -o APT::AutoRemove::RecommendsImportant=false \
    -o APT::AutoRemove::SuggestsImportant=false \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY . /app

RUN composer install --no-interaction --optimize-autoloader

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

RUN npm install

EXPOSE 3000
