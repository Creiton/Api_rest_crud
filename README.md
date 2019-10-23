# Laravel 6 REST API CRUD
Laravel api rest crud blog application with add, edit and delete function, titulo, autor, categoria e texto.

## Prerequisite
As it is build on the Laravel framework, it has a few system requirements. Of course, all of these requirements are satisfied by the Laravel Homestead virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.

However, if you are not using Homestead, you will need to make sure your server meets the following requirements:

- PHP >= 7.1.3
- MySql >= 5.7
- Composer
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

You can check all the laravel related dependecies <a href="https://laravel.com/docs/6.x/installation"  target="_blank"> here </a>.

## API Endpoints and Routes

You can check in the **routes/api.php** file for all the routes that map to controllers in order to send out JSON data that make requests to our API.

SHOW: http://localhost:8000/api/products

POST | api/products

GET | api/products/{id}

PUT | api/products/{id}

DELETE | api/products/{id}
