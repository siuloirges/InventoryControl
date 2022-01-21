<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stores_id');
            $table->unsignedBigInteger('products_id')->default(0);
            $table->unsignedBigInteger('price_products');
            $table->unsignedBigInteger('cost');
            $table->unsignedBigInteger('cms_users_id');
            $table->unsignedBigInteger('suppliers_id');
            $table->unsignedBigInteger('stock');
            $table->unsignedBigInteger('stock_in');
            $table->unsignedBigInteger('stock_out')->default(0);
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
