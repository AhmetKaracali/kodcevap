<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etiket;
use Faker\Generator as Faker;

$factory->define(Etiket::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
         'slug' => $faker->slug(1),
        'color' => $faker->rgbCssColor(),
    ];
});
