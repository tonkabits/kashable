<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        //lets seed the DB
        'name' => $faker->word,
        'title' => $faker->word,
        'description' => $faker->sentence($nbWords = 12),
        'image_name' => 'resources/images/image1.png',
    ];
});

