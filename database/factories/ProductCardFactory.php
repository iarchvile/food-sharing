<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Cities;
use App\Models\ProductCard;
use App\Models\ProductsCategory;
use App\Models\User;
use App\Models\ProductCardStatus;
use Faker\Generator as Faker;

$factory->define(ProductCard::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber,
        'products_category_id' => $faker->randomElement(ProductsCategory::pluck('id')->toArray()),
        'title' => $faker->sentence(5, false),
        'description' => $faker->paragraph(),
        'address' => $faker->address,
        'latitude' => $faker->latitude(35, 55),
        'longitude' => $faker->latitude(55, 60),
        'photos' => [
            'https://loremflickr.com/350/255/food/all?r='.$faker->unique()->randomNumber(),
            'https://loremflickr.com/350/255/food/all?r='.$faker->unique()->randomNumber(),
            'https://loremflickr.com/350/255/food/all?r='.$faker->unique()->randomNumber(),
        ],
        'city_id' => Cities::pluck('id')->random(),

    ];
});
