<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->word,
        'title' => $faker->word,
        'category_id' => $faker->numberBetween($min = 1 , $max = 10),
        'description' => $faker->sentence($nbWords = 6),
        'image_name' => 'resources/images/image1.png',
        'price' => $faker->numberBetween($min = 1 , $max = 8),

    ];
});
