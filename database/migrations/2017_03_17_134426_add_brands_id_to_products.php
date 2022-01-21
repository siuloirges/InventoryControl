<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandsIdToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('products')) {
          Schema::table('products', function (Blueprint $table) {
              $table->integer('brands_id')->nullable(); 
          });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        if (Schema::hasTable('products')) {
          Schema::table('products', function (Blueprint $table) {
              $table->dropColumn('brands_id');
          });
        }
    }
}
