<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_reports', function (Blueprint $table) {
            $table->id();
            $table->double('employee_commission')->nullable();
            $table->string('mes');
            $table->string('url_pdf')->nullable();
            $table->string('type_reports');
            $table->boolean('employee_approval')->nullable();
            $table->double('bonus')->nullable();
            $table->text('reason_bonus')->nullable();
            $table->double('discount')->nullable();
            $table->text('reason_discount')->nullable();
            $table->boolean('is_finished')->nullable();
            $table->unsignedBigInteger('stores_id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('payment_reports');
    }
}
