<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
      'user_id'   => App\User::all()->random()->id,
      'name'     => $faker->sentence(1),
    ];
});
