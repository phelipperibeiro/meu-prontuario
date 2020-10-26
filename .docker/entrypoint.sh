#!/bin/bash

composer install
composer update
php artisan key:generate
php artisan migrate --seed
php artisan config:cache
chmod -R 777 storage
php-fpm

