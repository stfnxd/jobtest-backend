FROM php:8.3-fpm

WORKDIR /var/www/html

RUN echo "UTC" > /etc/timezone

RUN apt-get update && apt-get install -y
RUN apt-get install libpcre3-dev -y
RUN apt-get install libzip-dev -y
RUN apt-get install curl -y
RUN apt-get install wget -y
RUN apt-get install git -y
RUN apt-get install mercurial -y
RUN apt-get install subversion -y
RUN apt-get install libbz2-dev -y
RUN curl -sL https://deb.nodesource.com/setup_20.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt install -y nodejs
##Install nodejs##

RUN apt-get install autoconf -y
RUN apt-get install build-essential -y
RUN apt-get install libxml2-dev -y
RUN apt-get install libjpeg-dev -y
RUN apt-get install libpng-dev -y
RUN apt-get install libfreetype6-dev -y
RUN apt-get install libicu-dev -y
RUN apt-get install bzip2 unzip -y
RUN apt-get install imagemagick -y
##RUN apt-get install msttcorefonts-installer -y
RUN apt-get install fontconfig -y
RUN pecl install -o -f redis
RUN pecl install swoole
RUN docker-php-ext-install bz2
RUN apt-get install libjpeg62-turbo-dev -y

RUN docker-php-ext-configure gd
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install gd
RUN docker-php-ext-enable redis swoole

COPY config/php.ini /usr/local/etc/php/


RUN apt-get install icu-devtools 

RUN docker-php-ext-install pdo pdo_mysql pcntl mysqli xml opcache zip intl
RUN docker-php-ext-configure intl && docker-php-ext-install intl

RUN docker-php-ext-enable redis swoole

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/
RUN echo 'export NPM_TOKEN=glpat-8vvAN5hhKKLhNNNnaGP9' >> ~/.bashrc 
RUN chmod -R 777 /var/www/html
WORKDIR /var/www/html