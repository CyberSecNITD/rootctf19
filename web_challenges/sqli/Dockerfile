FROM php:7.2.2-apache

RUN apt-get install php5-mysqlnd

RUN docker-php-ext-install mysqli

WORKDIR /var/www/

COPY ./code/* html/

COPY ./db.php .

RUN apt update && apt upgrade


