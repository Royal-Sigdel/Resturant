<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\menu;
use Faker\Generator as Faker;

$factory->define(menu::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'price' => $faker->numberBetween(20,9999),
        'resto_id' => $faker->numberBetween(1,20),
        'category_id' => $faker->numberBetween(1,20),

    ];
});
