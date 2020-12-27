<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\cevap;
use App\Model;
use Faker\Generator as Faker;

$factory->define(cevap::class, function (Faker $faker) {
    return [
        'owner' => rand(1,30),
        'questionID' => rand(1,20),
        'body' => $faker->sentence(10),
        'created_at' => $faker->dateTime(),
        'score' => rand(1,5)
    ];
});
