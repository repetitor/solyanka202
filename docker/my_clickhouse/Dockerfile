FROM ubuntu:latest
RUN apt-get update && apt-get install -y nginx
RUN apt-get update && apt-get install -y nano

# https://clickhouse.tech/docs/ru/getting-started/install/
#sudo apt-get install apt-transport-https ca-certificates dirmngr
#sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv E0C56BD4
#
#echo "deb https://repo.clickhouse.tech/deb/stable/ main/" | sudo tee \
#    /etc/apt/sources.list.d/clickhouse.list
#sudo apt-get update
#
#sudo apt-get install -y clickhouse-server clickhouse-client
#
#sudo service clickhouse-server start
#clickhouse-client

RUN apt-get install -y apt-transport-https ca-certificates dirmngr
RUN apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv E0C56BD4

RUN echo "deb https://repo.clickhouse.tech/deb/stable/ main/" | tee \
    /etc/apt/sources.list.d/clickhouse.list

RUN apt-get update

RUN yes "" | apt-get install -y clickhouse-server clickhouse-client

WORKDIR /sandbox

#CMD ["nginx", "-g", "daemon off;"]

COPY my-entrypoint.sh /my-entrypoint.sh
RUN chmod +x /my-entrypoint.sh
ENTRYPOINT ["/my-entrypoint.sh"]