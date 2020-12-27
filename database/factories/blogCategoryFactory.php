<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\blogCategory;
use App\Model;
use Faker\Generator as Faker;

$factory->define(blogCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'slug' => $faker->slug,
        'seoTitle' => $faker->word(),
        'seoDesc' => $faker->sentence(10),
    ];
});
