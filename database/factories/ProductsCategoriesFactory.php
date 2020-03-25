<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\ProductsCategory;
use Faker\Generator as Faker;

$factory->define(ProductsCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3, false),
        'description' => $faker->paragraph(),
    ];
});
