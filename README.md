Challenge Supera
============

## Description

The challenge_supera repostory contains the challenge proposed by the company Supera.
It's a system developed to register car tips.
This solution was created using Framework PHP Laravel, Jquery and Bootstrap.

## Prerequisites 
- [Composer](https://getcomposer.org/download/)
- [Docker](https://www.docker.com/get-started)

## Prerequisites without Docker
- [Composer](https://getcomposer.org/download/)
- [PHP Server](https://www.php.net/downloads.php)
- [MySQL Server](https://www.mysql.com/downloads/)

## Usage
Commands to run project with Docker 

In the directory root, open laradock directory
```bash
cd laradock
```
Run the docker with the apps
```bash
docker-compose up -d nginx mysql phpmyadmin 
```
Await for Docker open the applications.

when docker starts all applications, open www, the laradocker diretory
```
docker-compose exec --user=laradock workspace bash
```
Execute the migrates.
```
php artisan migrate
```
Execute the seeders.
```
php artisan db:seed --class=DatabaseSeeder
```
And now run the application
```
http://localhost:9090
```

## Authors

- [Gabriel Ripardo](https://github.com/gabrielripardo/)

## Observation

For more information
- [Laradock](https://laradock.io/)
- [Laravel](https://laravel.com/)
