<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Soru;
use Faker\Generator as Faker;

$factory->define(Soru::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'toplulukID' => rand(1,5),
        'body' => $faker->paragraphs(3,'1'),
        'slug' =>$faker->slug(),
        'owner' => rand(1,20),
        'crdate' => $faker->dateTime()
    ];
});
