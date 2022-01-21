<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsProducts extends Migration
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
                $table->string('is_public')->nullable();
                $table->string('commission_sale')->nullable();
                $table->text('public_description')->nullable();
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
//        if (Schema::hasTable('products')) {
//            Schema::table('products', function (Blueprint $table) {
//                $table->dropColumn('is_public');
//                $table->dropColumn('commission_sale');
////                $table->dropColumn('public_description');
//            });
//        }
    }
}
