<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\blogPost;
use App\Model;
use Faker\Generator as Faker;

$factory->define(blogPost::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug,
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(3,'1'),
        'seoDesc' => $faker->paragraphs(1,'1'),
        'owner' => rand(1,10),
        'gorsel' => $faker->imageUrl(),
        'views' => 0,
    ];
});
