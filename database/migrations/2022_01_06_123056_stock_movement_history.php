<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StockMovementHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_movement_history', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('quantity')->default(false);
            $table->boolean('is_in')->default(false);
            $table->boolean('is_out')->default(false);

            //relations
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->unsignedBigInteger('stocks_id');
            $table->unsignedBigInteger('orders_detail_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();

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
        Schema::dropIfExists('stock_movement_history');
    }
}
