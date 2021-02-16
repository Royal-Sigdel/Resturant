<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\order_details;
use Faker\Generator as Faker;

$factory->define(order_details::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween(1,999),
        'menu_id' => $faker->numberBetween(1,999)

    ];
});
