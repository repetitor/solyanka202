# solyanka202

```
docker-compose config
```

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
### sudo chown -R $USER:$USER ./app

# browser >> 192.168.16.3
# or
# sudo bash -c "echo \"192.168.16.3 laravel.docker.solyanka202.loc\" >> /etc/hosts"
# browser >> laravel.docker.solyanka202.loc

# xdebug
# /etc/hosts
# PHPSTORM
# 1. File/Settings/Languages&Frameworks/PHP/Servers
# 2. Run/Edit Configurations.../PHP Remote Debug/Filter debug connections by IDE key
# 2.1 IDE key (session id): PHPSTORM

# database like mysql
# docker-compose exec <db-servise> bash
# docker-compose exec mysql5-laravel bash
# mysql -u root -p
# =>
# GRANT ALL ON mydbname.* TO 'mydbuser'@'%' IDENTIFIED BY 'mydbpassword';
# FLUSH PRIVILEGES;
# EXIT;
```

## OSs

### ubuntu
```
# tmp
docker run -it --rm ubuntu bash


docker-compose up -d ubuntu-sandbox
docker-compose exec ubuntu-sandbox bash
```

## databases

### mysql
```
docker-compose up -d mysql-sandbox
docker-compose exec mysql-sandbox bash
# =>
# mysql -u root -p <database> < <file.sql>
mysql -u root -p mydbname < try-mysql.sql
```

### mariadb
```
docker-compose up -d mariadb-sandbox
docker-compose exec mariadb-sandbox bash
# =>
# mysql -u root -p <database> < <file.sql>
mysql -u root -p mydbname < try-mysql.sql
```

### postgres
```
docker-compose up -d postgres10-sandbox
docker-compose exec postgres10-sandbox bash
# =>
psql -h localhost -p 5432 -U mydbuser -d mydbname < try-mysql.sql
```

### clickhouse
```
docker-compose up -d clickhouse-sandbox
docker-compose exec clickhouse-sandbox bash
# =>
clickhouse-client
```

### sqlite
```
docker-compose up -d sqlite3-sandbox
docker-compose exec sqlite3-sandbox bash
# =>
sqlite3 docker-sqlite-db
=>
CREATE TABLE myTable (id INTEGER, name VARCHAR(100));
insert into myTable (id, name) values (1, 'name2');
select * from myTable;
.quit

# =>
exit
# =>
sudo chown -R $USER:$USER sandbox/draft/sqlite3-sandbox/
```

## languages

### python
```
docker-compose up -d python-sandbox
docker-compose exec python-sandbox bash

# browser:
# - 192.168.17.6:1234
# - localhost:1234
```

### php
```
docker-compose up -d php-sandbox
docker-compose exec php-sandbox bash

# browser: 
# - 192.168.17.7:8000
# - localhost:8033

# php8-cli
docker-compose up -d php8-cli-sandbox
# http://192.168.17.8:8081/
```
