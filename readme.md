# Description

For this project I did the version 1. In this project first I created the front end and then based 
on it I designed the Back end and later I did the adjustment.
For the Backend I created the room resources (first migration and model, then controller) and I seeded the database with the initial one room
for test purposes (In front end I hard coded the room id, but in version 2 it should get the room id from router). 
Then I created the typical BREAD methods for Room plus messages API, in order to get the messages of a room.
After that I created the messages table and controller. I also add two gates for update and delete in order for users to prevent from deleting/updating other user's message.

# Laravel Vue SPA
Starter Boilerplate SPA made with Laravel 5.6, Bootstrap 4, JWT Auth, Vue 2, Vue-router 3, Vuex 3, Axios & :heart:

## Demo 

![Laravel Vue SPA](https://media.giphy.com/media/26n3JhU8JqIYlxVCw/giphy.gif)

[Live Demo](https://laravel-vue-spa.herokuapp.com)

## What's New
 * Upgraded to [Bootstrap 4](http://getbootstrap.com) from [Bootstrap 3](https://getbootstrap.com/docs/3.3)
 * Upgraded to [Vuex 3](http://vuex.vuejs.org) from Vuex 2
 * Upgraded to [Vue Router 3](http://router.vuejs.org) from Vue Router 2
 * All packages are updated (both PHP and JS)
 * Removed unnecessary vuex store modules
 * Project structure updated
 
## What's included 
* [Laravel 5.6](https://laravel.com/docs/5.6)
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
