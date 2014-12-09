<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiesgoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('riesgos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->text('descripcion');
			$table->tinyInteger('impacto');
			$table->tinyInteger('probabilidad');
			$table->float('costo');
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
		Schema::table('riesgos', function(Blueprint $table)
		{
			$table->drop();
		});
	}

}
