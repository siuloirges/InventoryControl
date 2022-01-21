<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prospectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospecto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('type_prospecto_id');
            $table->unsignedBigInteger('type_document_id')->default(1);
            $table->string('document_number')->nullable();
            $table->string('names')->nullable();
            $table->string('last_names')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->string('adress')->nullable();
            $table->string('status')->default("Por Contactar");
            $table->text('description')->nullable();
            $table->string('qualification')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->boolean('is_client')->nullable();


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
        Schema::dropIfExists('prospecto');
    }
}
