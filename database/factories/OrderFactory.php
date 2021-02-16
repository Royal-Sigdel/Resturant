<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;


$factory->define(Order::class, function (Faker $faker) {
    return [
        'resto_id' => 1,
        'user_id' => 1,
        'amount' => $faker->numberBetween(99, 500),
        'isComplete' => $faker->randomElement([0,1]),
        'complete_at' => $faker->date('Y-m-d h:m:s'),
        'Customer_Name'=>$faker->word,
        'Customer_Address' => $faker->sentence,
        'Customer_phone_no' => $faker->numberBetween(1,20)
    ];
});
