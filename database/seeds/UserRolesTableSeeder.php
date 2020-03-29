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
            ['id' => UserRoleEnum::USER, 'name' => 'user'],
            ['id' => UserRoleEnum::MODERATOR, 'name' => 'moderator'],
            ['id' => UserRoleEnum::ADMIN, 'name' => 'admin'],
        ]);
    }
}
