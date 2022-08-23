FROM php:7.3-fpm

# Copy composer.lock and composer.json
COPY ./composer.json* /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    git \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl
#RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

USER root

COPY ./ /var/www

# Install and run composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer -v
RUN composer install

#IF DOCKER IS ON LINUX CORE THEN UNCOMMENT THIS 3 LINES
#RUN php artisan migrate
#RUN php artisan pages:imports
#RUN php artisan key:generate

RUN apt-get update
RUN apt-get -y install curl gnupg
RUN curl -sL https://deb.nodesource.com/setup_12.x  | bash -
RUN apt-get -y install nodejs
RUN npm install

#IF DOCKER IS ON LINUX CORE THEN UNCOMMENT THIS 2 LINES
#RUN npm install
#RUN npm run prod

#CHEKC NODE AND NPM VERSIONS
RUN node -v
RUN npm -v

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
