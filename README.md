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

sudo chmod -R 755 app-laravel/storage/

# browser >> 192.168.16.2
# or
# sudo bash -c "echo \"192.168.16.12 laravel.loc\" >> /etc/hosts"
# browser >> laravel.loc
```
