# Install dependencies
composer install

# Setup env
cp .env.example env

# generate key
php artisan key:generate