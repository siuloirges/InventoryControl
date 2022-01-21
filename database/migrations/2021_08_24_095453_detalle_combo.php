<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleCombo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kit_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_kit_id')->nullable();
            $table->unsignedBigInteger('products_id')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
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
        Schema::dropIfExists('product_kit_detail');
    }
}
