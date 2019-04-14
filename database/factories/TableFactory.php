<?php

use Faker\Generator as Faker;

$factory->define(App\Table::class, function (Faker $faker) {
    return [
        //this are the factory fields
        'number' => $faker->randomDigit,
        'style' => '"background": "#c3c3c3"',
        'top' => 120,
        'left' => 120,
           
        ];
});
