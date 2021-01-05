FROM ubuntu:latest
RUN apt-get update && apt-get install -y nginx
RUN apt-get update && apt-get install -y nano

WORKDIR /sandbox

CMD ["nginx", "-g", "daemon off;"]
