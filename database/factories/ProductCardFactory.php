<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductCard;
use App\Models\ProductsCategory;
use Faker\Generator as Faker;

$factory->define(ProductCard::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber,
        'products_category_id' => $faker->randomElement(ProductsCategory::pluck('id')->toArray()),
        'title' => $faker->sentence(5, false),
        'description' => $faker->paragraph(),
    ];
});
