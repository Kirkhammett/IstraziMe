# Istrazi.Me

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Istrazi.Me is a Laravel based web app which displays a list archaeological locations based in Macedonia, as well as details, ticket costs and photographs
for each individual location.
This application assumes you have a local installation of Composer php dependency manager and a Laravel installation. If not, run:
```bash
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```
Or if you're on Windows just download the .exe file from https://getcomposer.org/download/

Then you just install Laravel from the terminal by issuing: 
```bash
composer global require "laravel/installer=~1.1"
```
The project by itself can be downloaded as a .zip from Github, or you can clone it to your local machine by running:
```bash
git clone https://github.com/Kirkhammett/IstraziMe.git
```

#Installation

In order to set up a local instance of the app you need to first download all the dependencies via Composer. Since the vendor folder is the one holding all dependencies but at the same time is ignored by git so as not to clog up the project while pushing to GitHub and minimize download & extract time. So, you'll need to add them manually by cd-ing into the project root directory and executing:
```bash
cd laravel/app/location && composer install
```
Once all the dependencies have been installed, you'll need to set up your own environment. The .env.example file contains dummy data with placeholders, this is the data you need to supply Laravel with in order for the app to work and communicate with the DB. This includes providing a DB hostname, DB user & password (if any) and the type of connection (MySQL in this case). Once all that is done, you need to rename the .env.example to .env by running:

```bash
mv .env.example .env 
```

One last thing to configure for the app to work is generating an app key for encrypting data like Sessions etc. We can generate this by issuing  ``` php artisan key:generate ``` in the terminal, this will be automatically added in our .env file.

## Usage

Once our development environment has been set up, it's time for us to migrate the database tables into our database (assuming you created one in MySQL and provided the name of the DB in the .env file). We migrate all our tables by running the following command in the terminal inside the project root folder:
```bash
php artisan migrate
```
Once that is done, if you configured everything correctly, you will get a confirmation message of all the migrations created.
And lastly, now that we have our DB schema all set up, we can populate the database with all the predifined data it comes with via seeds. These are all inside the database seeds file, so all you need to do is run:
```bash
php artisan db:seed
```
Once that finishes, you should have the full application set up and ready for launch.
Just run the ``` php artisan serve ``` command in your terminal, and your local instance of the app will be served.


## Useful commands
| **Command** | **Description** |
|:-------------|:----------------|
|php artisan migrate:refresh|Rollback the DB migrations and re-run all of your migrations without seeding.|
|php artisan migrate:refresh --seed|Rollback the DB migrations and re-run all of your migrations and seeds|
|php artisan migrate --force|Force the migration without any prompts. Dangerous.|
|php artisan migrate:reset|Completely rollback all database migrations.|
|php artisan serve --port=xxxx|Serve Laravel on a specific port.|

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).
