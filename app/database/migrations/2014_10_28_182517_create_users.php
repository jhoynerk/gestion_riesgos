<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cedula', 9)->unique();
			$table->string('correo', 254)->unique();
			$table->string('nombre', 50);
			$table->string('apellido', 50);
			$table->string('password', 70);
			$table->tinyInteger('rol');
			$table->string('remember_token', 100);
			$table->timestamps();
			$table->create();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->drop();
		});
	}

}
