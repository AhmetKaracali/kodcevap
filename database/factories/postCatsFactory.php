<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\postCategories;
use App\Model;
use Faker\Generator as Faker;

$factory->define(postCategories::class, function (Faker $faker) {
    return [
        'postID' => rand(0,10),
        'catID' => rand(0,5),
    ];
});
