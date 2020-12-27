<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\userFollowers;
use Faker\Generator as Faker;

$factory->define(userFollowers::class, function (Faker $faker) {
    return [
        'followed' => rand(21,40),
        'follower' => rand(1,20),
        'date' => $faker->dateTime(),
    ];
});
