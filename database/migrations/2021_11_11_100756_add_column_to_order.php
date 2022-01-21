<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( Schema::hasTable('orders') ) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('payment_gateway_agent_id')->nullable();
                $table->string('payment_gateway_agent_status')->nullable()->comment('Estados del agente payment_gateway');
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
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('payment_gateway_agent_id');
                $table->dropColumn('payment_gateway_agent_status');
            });
        }
    }
}
