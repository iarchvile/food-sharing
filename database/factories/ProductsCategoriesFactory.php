<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\ProductsCategory;
use Faker\Generator as Faker;

$factory->define(ProductsCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3, false),
        'description' => $faker->paragraph(),
        'photo' => 'https://loremflickr.com/338/225/food/all?r='.$faker->unique()->randomNumber(),
    ];
});
