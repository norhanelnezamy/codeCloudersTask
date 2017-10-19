# Fresh Installation


php -r "file_exists('.env') || copy('.env.example', '.env');"

composer update

php artisan key:generate

php artisan migrate

php artisan serve then open next URL http://127.0.0.1:8000/
