<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('products_category_id')->nullable(false);
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('geo_data')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('product_cards', function (Blueprint $table) {
            $table->foreign('products_category_id')
                ->references('id')
                ->on('products_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_cards');
    }
}
