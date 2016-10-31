# Laravel Vue SPA
Starter Boilerplate SPA made with Laravel 5.3, JWT Auth, Vue 2, Vue-router 2, Vuex 2 & <3

## What's included 
* [Laravel 5.3](https://laravel.com/docs/5.3)
* [Vue 2](https://vuejs.org)
* [Vue Route 2](http://router.vuejs.org)
* [Vuex 2](http://vuex.vuejs.org)
* [Authentication with JWT Token](https://github.com/tymondesigns/jwt-auth)

## Installation:
* Clone the repo
* Copy `.env.example` to `.env`
* Configure `.env`
* `cd` to the repo
* Run `php artisan key:generate`
* Run `composer install --no-scripts`
* Run `php artisan migrate --seed`. A user will be seeded so that you can login, where:
    * email is: root@example.com
    * password is: root
* Run `npm install`
* Run `gulp watch`
* View the site by 
    * Either running `php artisan serve` if you are not using vagrant homestead (in a new terminal/command prompt)
    * Otherwise go to your local dev url configured in vagrant

For any problem in laravel setup, please get help from [Laravel](https://laravel.com) site. If that does not work, please create an issue, I will try my best to help.
     
## Note:
I tried to follow the best practices, but any suggestion, modification is highly appreciated.  