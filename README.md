# solyanka202

## apps

### deploy original laravel
```
cp app-laravel/.env.example app-laravel/.env

docker-compose up -d app
docker-compose up -d nginx

docker-compose exec app bash
# =>
composer install
php artisan key:generate
exit
# =>
sudo chown -R 1000:1000 app-laravel/

# ??? 755 - doesn't work
sudo chmod -R 777 app-laravel/storage/

# browser >> 192.168.16.2
# or
# sudo bash -c "echo \"192.168.16.12 laravel.loc\" >> /etc/hosts"
# browser >> laravel.loc
```

#### challenge
```
# browser >> 192.168.16.2 -> success

sudo chmod -R 775 app-laravel/storage/
# browser >> 192.168.16.2 -> success

# do empty APP_KEY
sed -i 's/^APP_KEY=.*/APP_KEY=/' app-laravel/.env

# >>
# browser >> 192.168.16.2 -> error (laravel.log - Permission denied) ???

docker-compose exec app bash
# >>
php artisan key:generate
php artisan cache:clear
exit

# >>
# browser >> 192.168.16.2 -> error (laravel.log - Permission denied) ???

sudo chmod -R 775 app-laravel/storage/ app-laravel/bootstrap/cache/
# browser >> 192.168.16.2 -> error (laravel.log - Permission denied) ???

sudo chmod -R 777 app-laravel/storage/
# browser >> 192.168.16.2 -> success

sudo chmod -R 775 app-laravel/storage/
# browser >> 192.168.16.2 -> success ??? !!!

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
