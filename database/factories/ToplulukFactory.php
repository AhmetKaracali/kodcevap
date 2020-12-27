<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topluluk;
use Faker\Generator as Faker;

$factory->define(Topluluk::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'slug' => $faker->slug(),
        'color' => $faker->rgbCssColor(),
    ];
});
