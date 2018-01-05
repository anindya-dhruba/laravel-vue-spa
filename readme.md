# Laravel Vue SPA
Starter Boilerplate SPA made with Laravel 5.5, JWT Auth, Vue 2, Vue-router 3, Vuex 3, Axios & :heart:

## What's New
 * Updated to [Laravel 5.5](https://laravel.com/docs/5.5) from [Laravel 5.4](https://laravel.com/docs/5.4)
 * Build system uses [Laravel Mix](https://laravel.com/docs/5.5/mix) (webpack) instead of [Laravel Elixir](https://laravel.com/docs/5.3/elixir) (gulp)
 * All packages are updated (both PHP and JS)
 * Using [Axios](https://github.com/mzabriskie/axios) instead of [Vue Resource](https://github.com/pagekit/vue-resource) [(why?)](https://medium.com/the-vue-point/retiring-vue-resource-871a82880af4#.dlferoozu)
 * Project structure updated
## What's included 
* [Laravel 5.5](https://laravel.com/docs/5.5)
* [Vue 2](https://vuejs.org)
* [Vue Router 3](http://router.vuejs.org)
* [Vuex 3](http://vuex.vuejs.org)
* [Axios](https://github.com/mzabriskie/axios)
* [Authentication with JWT Token](https://github.com/tymondesigns/jwt-auth)

## Installation:
* Clone the repo
* Copy `.env.example` to `.env`
* Configure `.env`
* `cd` to the repo
* Run `composer install --no-scripts`
* Run `php artisan key:generate`
* Run `php artisan migrate --seed`. A user will be seeded so that you can login, where:
    * email is: `root@example.com`
    * password is: `root`
* Run `npm install`
* Run `npm run watch`
* View the site by 
    * Either running `php artisan serve` if you are not using vagrant homestead or laravel valet (in a new terminal/command prompt)
    * Otherwise go to your local dev url configured in vagrant

For any problem in laravel setup, please get help from [Laravel](https://laravel.com) site. If that does not work, please create an issue, I will try my best to help.
     
## Note:
I tried to follow the best practices, but any suggestion, modification is highly appreciated.  
