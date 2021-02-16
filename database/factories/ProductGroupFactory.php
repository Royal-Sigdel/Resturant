<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product_Group;
use Faker\Generator as Faker;

$factory->define(Product_Group::class, function (Faker $faker) {
    return [
        'sgroup_code' => $faker->word,
        'sgroup_description' => $faker->paragraph()
    ];
});
