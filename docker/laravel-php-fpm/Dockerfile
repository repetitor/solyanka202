FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        curl \
        git \
        atop \
        nano \
        libpq-dev \
        && docker-php-ext-install pdo_mysql pdo_pgsql pcntl \
        && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
        && pecl install xdebug && docker-php-ext-enable xdebug

# nginx-php user
ARG UID
ARG NGINX_PHP_USER
RUN addgroup --gid $UID --system $NGINX_PHP_USER \
    && adduser --uid $UID --system --disabled-login --disabled-password \
    --gid $UID \
    $NGINX_PHP_USER
ARG PATH_LISTEN_SETTINGS=/usr/local/etc/php-fpm.d/zz-docker.conf
RUN sed -i 's@listen = 9000@listen = /sock/docker.sock@' $PATH_LISTEN_SETTINGS \
    && echo 'listen.owner = '$NGINX_PHP_USER >> $PATH_LISTEN_SETTINGS \
    && echo 'listen.group = '$NGINX_PHP_USER >> $PATH_LISTEN_SETTINGS \
    && echo 'listen.mode = 0660' >> $PATH_LISTEN_SETTINGS
RUN sed -i 's/user = www-data/user = '$NGINX_PHP_USER'/' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i 's/group = www-data/group = '$NGINX_PHP_USER'/' /usr/local/etc/php-fpm.d/www.conf

# xdebug
ARG CLIENT_HOST
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN sed -i 's@xdebug.client_host=.*@xdebug.client_host='$CLIENT_HOST'@' /usr/local/etc/php/conf.d/xdebug.ini

CMD ["php-fpm"]