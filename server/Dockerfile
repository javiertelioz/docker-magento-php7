FROM nginx:alpine

MAINTAINER Javier Telio Zapot <jtelio118@gmail.com>

WORKDIR /var/www/html

COPY . .

ADD ./config/vhost.conf /etc/nginx/conf.d/default.conf