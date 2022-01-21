<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('customers_id')->nullable();
            $table->unsignedBigInteger('shipping_agent_id')->nullable();
            $table->string('shipping_agent_status')->nullable();
            $table->string('order_number',25)->nullable();
            $table->string('status')->default('EN VALIDACION')->comment("['EN VALIDACION','ALISTAMIENTO','GUIA GENERADA','EN REPARTO','ENTREGADO','PENDIENTE','RESERVADA','EN NOVEDAD','CANCELADA']");
            $table->string('online_payment_status')->default('Por definir');
            $table->double('total')->default(0);
            $table->double ('tax')->default(0);
            $table->boolean('is_tax')->default(false);
            $table->double('discount')->default(0);
            $table->double('grand_total')->default(0);
            $table->string('guide_number')->nullable();
            $table->string('adress')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('who_receives')->nullable();
            $table->string('receives_identification_number')->nullable();
            $table->string('Description')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
