<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('stores_id');
            $table->unsignedBigInteger('stocks_id');
            $table->string('imei')->unique();
            $table->boolean('is_sold')->default(false);
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('reference')->nullable();
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
        Schema::dropIfExists('inventory');
    }
}
