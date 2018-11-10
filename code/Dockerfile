FROM php:7.2-fpm-alpine

LABEL maintainer="Javier Telio Zapot <jtelio118@gmail.com>" \
	version.image="v1.0" \
	description="A Magento Docker"

WORKDIR /var/www/html

COPY . .

COPY ./bin/install-magento /usr/local/bin/install-magento
RUN chmod +x /usr/local/bin/install-magento

COPY ./sampledata/magento-sample-data-1.9.1.0.tgz /opt/
COPY ./bin/install-sampledata-1.9 /usr/local/bin/install-sampledata
RUN chmod +x /usr/local/bin/install-sampledata

# Install Libs
RUN apk add --no-cache --virtual .build-deps libxml2-dev libpng libpng-dev libmcrypt-dev jpeg-dev freetype-dev php7-mcrypt
# Install PHP Ext
RUN docker-php-ext-install soap \
	pdo \
	pdo_mysql \
	mbstring \
	gd \
	pcntl \
	posix \
	bcmath \
	sockets

RUN curl -SL https://raw.githubusercontent.com/colinmollenhour/modman/master/modman -o modman \
    && chmod +x ./modman \
    && mv ./modman /usr/local/bin/

# Change Own
#RUN chown -R www-data:www-data /var/www/html

#COPY redis.conf /var/www/htdocs/app/etc/