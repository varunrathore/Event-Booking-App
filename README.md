Event Booking App

Description
This is a Laravel-based event booking system.

Setup Instructions

Ensure you have the following installed:
PHP 8.x
Composer
MySQL
Laravel 10.x
git

Installation Steps
Clone the repository

git clone https://github.com/varunrathore/Event-Booking-App.git
cd Event-Booking-App

Install dependencies
composer install

Copy the environment file and configure it
cp .env.example .env

Edit the .env file and set up your database credentials and other environment variables.

Generate application key
php artisan key:generate

Run migrations and seeders
php artisan migrate --seed

Serve the application
php artisan serve

The application will be available at http://127.0.0.1:8000.

Running Tests
step 1 - Change db credentials for testing with event_testing_db.
Run feature and unit tests using:
php artisan test

Postman Collection

A Postman collection is included in the postman folder. Import it into Postman to test the API endpoints.
set base_url to http://127.0.0.1:8000 in postman environment.

Clearing Cache
To clear the application cache:

php artisan cache:clear
php artisan config:clear
php artisan config:cache

Authentication and Authorization:-

Authentication:
We would use Laravel Sanctum (or Laravel Passport for OAuth) to authenticate API users.
Middleware to protect event management routes with via grouping api in sanctum
Route::middleware('auth:sanctum')->group(function () {
});
We can create a route to register user out of this sanctum group.

Authorization: Role-Based Access Control (RBAC)
