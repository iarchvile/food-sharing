<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductCard;
use App\Models\ProductsCategory;
use App\Models\User;
use App\Models\ProductCardStatus;
use Faker\Generator as Faker;

$factory->define(ProductCard::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'products_category_id' => $faker->randomElement(ProductsCategory::pluck('id')->toArray()),
        'title' => $faker->sentence(5, false),
        'description' => $faker->paragraph(),
        'status_id' => $faker->randomElement(ProductCardStatus::pluck('id')->toArray()),
    ];
});
