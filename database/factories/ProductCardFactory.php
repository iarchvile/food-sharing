<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Cities;
use App\Models\ProductCard;
use App\Models\ProductsCategory;
use App\Models\User;
use App\Models\ProductCardStatus;
use Faker\Generator as Faker;
use App\Enums\ProductCardStatusEnum;

$factory->define(ProductCard::class, function (Faker $faker) {
    return [
        'user_id' => User::pluck('id')->random(),
        'products_category_id' => ProductsCategory::pluck('id')->random(),
        'title' => $faker->sentence(5, false),
        'description' => $faker->paragraph(),
        'address' => $faker->address,
        'latitude' => $faker->latitude(35, 55),
        'longitude' => $faker->latitude(55, 60),
        'photos' => [
            'https://loremflickr.com/348/255/food/all?r='.$faker->unique()->randomNumber(),
            'https://loremflickr.com/348/255/food/all?r='.$faker->unique()->randomNumber(),
            'https://loremflickr.com/348/255/food/all?r='.$faker->unique()->randomNumber(),
        ],
        'city_id' => Cities::pluck('id')->random(),
        'status_id' => collect(
            [
                ProductCardStatusEnum::AWAITING_MODERATION,
                ProductCardStatusEnum::ACTIVE,
                ProductCardStatusEnum::COMPLETED,
                ProductCardStatusEnum::BLOCKED,
                ProductCardStatusEnum::REJECTED,
            ]
        )->random(),

    ];
});
