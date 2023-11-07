#FROM php:8.0-fpm

#RUN apt-get update && apt-get install -y \
    #git \
    #curl \
    #libpng-dev \
    #libonig-dev \
    #libxml2-dev \
    #zip \
    #unzip

#RUN apt-get update && \
    #apt-get install -y docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN docker-php-ext-install pdo_mysql mbstring gd


#WORKDIR /app
#COPY composer.json .
#RUN composer install --no-scripts
#RUN composer update
#COPY . .
#CMD php artisan serve --host=0.0.0.0 --port 80

# Used for prod build.
FROM public.ecr.aws/g8x7s9y4/educarte-base-image:latest as php

# Copy configuration files.
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Set working directory to ...
WORKDIR /app

# Copy files from current folder to container current folder (set in workdir).
COPY --chown=www-data:www-data . .

# Create laravel caching folders.
RUN mkdir -p ./storage/framework
RUN mkdir -p ./storage/framework/{cache, testing, sessions, views}
RUN mkdir -p ./storage/framework/bootstrap
RUN mkdir -p ./storage/framework/bootstrap/cache

# Adjust user permission & group.
RUN usermod --uid 1000 www-data
RUN groupmod --gid 1000  www-data

# Run the entrypoint file.
ENTRYPOINT [ "docker/entrypoint.sh" ]
