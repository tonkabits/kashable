<?php

use Faker\Generator as Faker;

$factory->define(App\Table::class, function (Faker $faker) {
    return [
        //this are the factory fields
        'number' => $faker->randomDigit,
        'style' => '{"id": "1", "width": "30px", "height": "30px", "background": "#c3c3c3"}',
           
        ];
});
