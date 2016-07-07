## Itobuz Laravel 5.1 starter

### Contains the following features:

* Generators for API and CRUD
* Auth for CRUD and app
* CORS and JWT Auth for API
* Web Installer for the project
* Integrated Styling and views
* 

## Pre-requisites 

* You must have php, mysql installed on server
* For Development; you need node, gulp, bower, gulp-cli, laravel, composer installed.
* .....
* 

### Development Notes

* Clone repo and cd into it.
* Do a `composer update` via cmd
* Again from command line, do `npm-install` and after that, do `bower-install`
* Run `gulp` from command line after that, and it should succeeed.
* Make sure you have your database and other variables included in .env file, user .env.example as reference
* Open the app in browser ( You can use homebrew or `php artisan serve`) 
* It will show you the requirments and if all are met ( all green), you should see a next button, which will migrate and seed your database.
* Now you can generate a new CRUD and API with this command
`php artisan mitul.generator:scaffold_api Offer --fieldsFile="json_fields/offer.json"`
* offers.json is included as an example ( A factory for the same is also included as an example)
* After the generation, you should now be able to visit `/offers` and manage it, and your api exists at `/api/v1/offers`
* Cheers!