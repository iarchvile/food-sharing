<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserRolesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductCardSeeder::class);
    }
}
