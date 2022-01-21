<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSkuToOrdersDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('orders_detail')) {
          Schema::table('orders_detail', function (Blueprint $table) {
              $table->string('products_sku',25)->nullable();
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
        if (Schema::hasTable('orders_detail.sku')) {
          Schema::table('orders_detail', function (Blueprint $table) {
              $table->dropColumn('sku');
          });
        }
    }
}
