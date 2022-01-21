<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailStockMovementHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_stock_movement_history', function (Blueprint $table) {
            $table->id();

            //relations
            $table->unsignedBigInteger('stock_movement_history_id');
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->unsignedBigInteger('orders_detail_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_stock_movement_history');
    }
}
