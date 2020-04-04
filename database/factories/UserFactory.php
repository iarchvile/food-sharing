<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Enums\UserRoleEnum;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'user_roles_id' => UserRoleEnum::USER,
        'remember_token' => Str::random(10),
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'latitude' => $faker->latitude(35, 55),
        'longitude' => $faker->latitude(55, 60),
    ];
});

$factory->create(User::class, [
    'name' => 'Admin',
    'email' => 'admin@admin',
    'email_verified_at' => now(),
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    'user_roles_id' => UserRoleEnum::ADMIN,
    'remember_token' => Str::random(10),
    'phone' => '+79181234567',
    'address' => 'Москва',
    'latitude' => 56,
    'longitude' => 38,
]);

$factory->create(User::class, [
    'name' => 'User',
    'email' => 'user@user',
    'email_verified_at' => now(),
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    'user_roles_id' => UserRoleEnum::USER,
    'remember_token' => Str::random(10),
    'phone' => '+79181234568',
    'address' => 'Новороссийск',
    'latitude' => 44,
    'longitude' => 37,
]);
