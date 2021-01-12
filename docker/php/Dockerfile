FROM php

RUN apt-get update && apt-get install -y \
        curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
        git

RUN apt-get update && apt-get install -y atop nano
