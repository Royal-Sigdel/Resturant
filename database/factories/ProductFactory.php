<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sprod_code' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'nMRP_Rate' => $faker->numberBetween(20,9999),
        'category_id' => $faker->numberBetween(1,20),
    ];
});
