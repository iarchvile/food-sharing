<?php

use Illuminate\Database\Seeder;
use App\Enums\ProductCardStatusEnum;

class ProductCardStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_card_statuses')->insert([
            ['id' => ProductCardStatusEnum::AWAITING_MODERATION, 'name' => 'Ожидает модерации'],
            ['id' => ProductCardStatusEnum::ACTIVE, 'name' => 'Активна'],
            ['id' => ProductCardStatusEnum::COMPLETED, 'name' => 'Завершена'],
            ['id' => ProductCardStatusEnum::BLOCKED, 'name' => 'Заблокирована'],
            ['id' => ProductCardStatusEnum::REJECTED, 'name' => 'Отклонена'],
        ]);
    }
}
