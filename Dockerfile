FROM composer AS vendor

WORKDIR /usr/app
COPY . .
RUN composer install --no-dev --no-suggest
FROM php:8.0-apache

COPY --from=vendor /usr/app /var/www/html
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]