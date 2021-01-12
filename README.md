# solyanka202

## apps

### deploy original laravel
```
docker-compose up -d laravel
docker-compose up -d nginx-laravel

#docker-compose exec <app> bash
docker-compose exec laravel bash
# =>
cp .env.example .env
php artisan key:generate

#composer install --ignore-platform-reqs
composer install

#chown -R <UID>:<GID> ./../app
chown -R 1000:1000 ./../app

exit
# =>

# browser >> 192.168.16.2
# or
# sudo bash -c "echo \"192.168.16.12 laravel.docker.loc\" >> /etc/hosts"
# browser >> laravel.docker.loc
```

## OSs

### ubuntu
```
# docker run -it --rm ubuntu202 bash
docker-compose up -d ubuntu
docker-compose exec ubuntu bash
```

## databases

### mysql
```
docker-compose up -d mysql
docker-compose exec mysql bash
# =>
mysql -u root -p draft < trymysql.sql
```

### mariadb
```
docker-compose up -d mariadb
docker-compose exec mariadb bash
# =>
mysql -u root -p draft < trymysql.sql
```

### postgres
```
docker-compose up -d postgres
docker-compose exec postgres bash
# =>
psql -h localhost -p 5432 -U docker -d docker < trymysql.sql
```

### clickhouse
```
docker-compose up -d clickhouse
docker-compose exec clickhouse bash
# =>
clickhouse-client
```

## languages

### python
```
docker-compose up -d python
docker-compose exec python bash

# browser:
# - 192.168.17.5:1234
# - localhost:1234
```

### php
```
docker-compose up -d php
docker-compose exec php bash

# browser: 
# - 192.168.17.6:8000
# - localhost:8000
```

#### challenge
```
192.168.17.6:8000 => This site can’t be reached ???
```
