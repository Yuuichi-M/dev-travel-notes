#!/bin/bash

cd /var/www/travel-notes/ && git pull
composer install
php artisan migrate
php artisan db:seed
php artisan config:cache
