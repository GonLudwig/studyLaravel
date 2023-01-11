FROM nginx:stable-apline

ADD ./nginx/nginx.conf /etc/nginx/nginx.conf

ADD ./nginx/backend.com.br.conf /etc/nginx/templates/backend.com.br.conf.template

RUN mkdir -p /var/www/html

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN chown -R laravel:laravel /var/www/html