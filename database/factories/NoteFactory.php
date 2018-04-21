<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    $user_id = App\User::all()->random()->id;
    return [
        'user_id'   => $user_id,
        'group_id'  => App\Group::where('user_id', $user_id)->get()->random()->id,
        'title'     => $faker->sentence(2),
        'content'   => $faker->text(400),
        'important' => $faker->boolean(),
    ];
});
