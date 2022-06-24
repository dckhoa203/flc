# Install dependencies
composer install

# Setup env
cp .env.example env

# generate key
php artisan key:generate

# Run migrate (Create tables)
php artisan migrate

# Run seed (Insert data)
php artisan db:seed

# Run
php artisan serve