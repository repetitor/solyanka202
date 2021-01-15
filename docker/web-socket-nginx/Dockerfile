FROM ubuntu:latest

RUN apt-get update && apt-get install -y nginx

ARG URL
ARG IP
COPY default.conf /etc/nginx/sites-enabled/default
RUN sed -i 's@laravel.docker@'$URL'@' /etc/nginx/sites-enabled/default
RUN sed -i 's@laravel-web-socket:9000@'$IP':9000@' /etc/nginx/sites-enabled/default

CMD ["nginx", "-g", "daemon off;"]