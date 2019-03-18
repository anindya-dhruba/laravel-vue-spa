<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'chat_id' => 1, /// By default we send message on the first chat
        'message' => $faker->sentence(12),
    ];
});
