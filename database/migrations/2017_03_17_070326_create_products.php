<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('name');
            $table->string('type')->comment("['standar','combo','servicio']");
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('stores_id');
            $table->dateTime('expiration_date')->nullable();
            $table->string('barcode')->nullable();
            $table->string('description')->nullable();
            $table->integer('discount_kit')->nullable();
            $table->double('commercial_sale_price')->default(0.0);

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
        Schema::dropIfExists('products');
    }
}
