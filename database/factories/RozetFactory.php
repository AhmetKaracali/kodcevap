<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rozet;
use Faker\Generator as Faker;

$factory->define(Rozet::class, function (Faker $faker) {
    return [
    'point' =>$faker->numberBetween(0,150),
    'name' =>$faker->word(),
    'color' =>$faker->rgbCssColor(),
    'created_at' => $faker->dateTime('now'),
    'updated_at' => $faker->dateTime('now'),
    ];
});
