# solyanka202

## deploy original laravel
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

### challenge
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

## ubuntu
```
docker-compose build ubuntu
docker run -it --rm ubuntu202 bash
```

## python
```
docker-compose up -d python
docker-compose exec python bash
```
