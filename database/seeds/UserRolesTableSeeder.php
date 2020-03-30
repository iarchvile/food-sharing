<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\UserRoleEnum;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            ['id' => UserRoleEnum::USER, 'name' => 'Пользователь'],
            ['id' => UserRoleEnum::MODERATOR, 'name' => 'Модератор'],
            ['id' => UserRoleEnum::ADMIN, 'name' => 'Администратор'],
        ]);
    }
}
