FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
        git \
        atop \
        nano

RUN pecl install xdebug && docker-php-ext-enable xdebug

ARG CLIENT_HOST
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN sed -i 's@xdebug.client_host=.*@xdebug.client_host='$CLIENT_HOST'@' /usr/local/etc/php/conf.d/xdebug.ini

CMD ["php-fpm"]