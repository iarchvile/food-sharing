<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsсomplaintToProductCards extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_cards', function (Blueprint $table) {
            $table->integer('is_сomplaint')->default(0)->comment('Жалоба (0 - нет, 1 - есть)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_cards', function (Blueprint $table) {
            $table->dropColumn('is_сomplaint');
        });
    }
}
