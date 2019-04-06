FROM php:7.2.2-apache

WORKDIR /var/www/html

RUN mkdir notes

RUN mkdir pwd

RUN chown -R www-data notes

RUN chown -R www-data pwd

COPY ./php/* ./

WORKDIR /var/www/

COPY ./flag.txt ./
