<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\menu;
use Faker\Generator as Faker;

$factory->define(menu::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'price' => $faker->numberBetween(20,9999),
        'resto_id' => 1,
        'category_id' => 1,

    ];
});
