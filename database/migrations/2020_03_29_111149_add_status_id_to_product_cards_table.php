<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ProductCardStatusEnum;

class AddStatusIdToProductCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->default(ProductCardStatusEnum::AWAITING_MODERATION)->after('is_сomplaint')->comment('Статус');
        });

        Schema::table('product_cards', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('product_card_statuses');
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
            $table->dropForeign('product_cards_status_id_foreign');
        });

        Schema::table('product_cards', function (Blueprint $table) {
            $table->dropColumn('status_id');
        });
    }
}
