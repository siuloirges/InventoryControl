<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableCmsUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('photo')->nullable();
			$table->string('email')->nullable();
			$table->string('password')->nullable();
			$table->integer('id_cms_privileges')->nullable();
            $table->dateTime('last_assign')->nullable();
			$table->boolean('available')->default(1);
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->string('sirena_id')->nullable();
            $table->string('code')->nullable();
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
		Schema::drop('cms_users');
	}

}
