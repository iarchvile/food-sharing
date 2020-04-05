<?php

use Illuminate\Database\Seeder;

class ProductCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ProductCard::class, 1000)->create();
    }
}
