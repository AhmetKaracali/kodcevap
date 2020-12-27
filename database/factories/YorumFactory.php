<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Yorum;
use Faker\Generator as Faker;

$factory->define(Yorum::class, function (Faker $faker) {
    return [
        'owner' => rand(5,40),
        'parent' => rand(1,10),
        'postID' => rand(1,2),
        'comment' => $faker->sentence(10),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
