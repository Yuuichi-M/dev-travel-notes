# Travel notes

<img width="1043" alt="スクリーンショット 2022-02-04 23 39 10" src="https://user-images.githubusercontent.com/71712059/152547710-49925c67-aa03-446b-9681-e0a8f8fbced5.png">


## ER図・画面遷移図

![画面遷移図・ER図-ページ2](https://user-images.githubusercontent.com/71712059/152547052-3ae3099a-2b26-4d11-9870-5d510b8cd6fd.jpg)

![画面遷移図・ER図-ページ1](https://user-images.githubusercontent.com/71712059/152547077-00aee217-e85e-4ca9-8e12-631a62f8ec6f.jpg)


## 開発環境構築

- docker images
  - laravel-app
    - php:7.4-fpm-alpine (nginx,php-fpm,supervisor)
    - Laravel 6.20.34
  - laravel-db
    - mysql:8.0.27
  - laravel-redis

- git clone or fork

```
mkdir -p ~/git/github
cd ~/git/github
git clone git@github.com:Yuuichi-M/travel-notes.git
```

- add localhost /etc/hosts

```
sudo vim /etc/hosts
127.0.0.1 dev-travel-notes.online
```

- docker run

```
cd travel-notes
cp .env.example .env
cd docker/dev
docker-compose up -d
```

- app deploy

```
docker exec -it laravel-app bash

composer install
php artisan key:generate
php artisan config:cache
php artisan migrate
php artisan db:seed
/usr/bin/supervisorctl restart app
```

- Access

http://dev-travel-notes.online/


<img width="1247" alt="スクリーンショット 2022-02-05 0 41 46" src="https://user-images.githubusercontent.com/71712059/152558190-6274ce00-1b58-4810-ba6a-9e5d50241912.png">


- DB login

```
docker exec -it laravel-app bash
mysql -u root -h db -p
```

- redis login
```
docker exec -it laravel-app bash
redis-cli -h redis

```
