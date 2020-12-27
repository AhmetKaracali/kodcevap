<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kodcevap;
use Faker\Generator as Faker;

$factory->define(Kodcevap::class, function (Faker $faker) {
    return [
        'id' => 1,
        'siteTitle' => 'Kodcevap',
        'description' => 'Kodcevap.',
        'logoURL' => '/images/logoNew.png',
        'facebook' => ' ',
        'twitter' => ' ',
        'instagram' => ' ',
        'linkedin' => ' ',
        'mail' => ' '
    ];
});
