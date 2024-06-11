#!/bin/bash

sleep 10

php artisan migrate --seed --force

php artisan serve --host=0.0.0.0 --port=8000
