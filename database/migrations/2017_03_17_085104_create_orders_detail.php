<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->unsignedBigInteger('products_id')->nullable();
            $table->string('products_name')->nullable();
            $table->double('products_price')->nullable();
            $table->unsignedBigInteger('quantity')->default(0);
            $table->double('sub_total')->nullable();
            $table->double('sale_price')->nullable();
            $table->double('discount')->default(0);


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

            Schema::dropIfExists('orders_detail');


    }
}
