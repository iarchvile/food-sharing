<?php

use App\Enums\UserRoleEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_roles_id')
                ->after('password')
                ->comment('id роли')
                ->default(UserRoleEnum::USER);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_roles_id')->references('id')->on('user_roles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_user_roles_id_foreign');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_roles_id');
        });
    }
}
