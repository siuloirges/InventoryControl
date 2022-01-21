<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('inventory')) {
            Schema::table('inventory', function (Blueprint $table) {
                $table->unsignedBigInteger('orders_detail_id')->nullable();
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
        if (Schema::hasTable('inventory')) {
            Schema::table('inventory', function (Blueprint $table) {
                $table->dropColumn('orders_detail_id');
            });
        }
    }
}
