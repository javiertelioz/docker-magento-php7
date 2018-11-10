FROM nginx:alpine

LABEL maintainer="Javier Telio Zapot <jtelio118@gmail.com>" \
	version.image="v1.0" \
	description="A Magento NGINX Docker"

WORKDIR /var/www/html

COPY . .

ADD ./config/vhost.conf /etc/nginx/conf.d/default.conf