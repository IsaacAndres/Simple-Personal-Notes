<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'user_id'   => App\User::all()->random()->id,
        'title'     => $faker->sentence(2),
        'content'   => $faker->text(400),
        'important' => $faker->boolean(),
    ];
});
