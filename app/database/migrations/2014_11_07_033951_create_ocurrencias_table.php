<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcurrenciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ocurrencias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha_error');
			$table->string('descripcion_rel_error');
			$table->integer('riesgo_id');
			$table->string('fuente_del_error');
			$table->integer('user_responsable_id');
			$table->integer('user_registro_id');
			$table->float('costo_impacto');
			$table->float('costo_solucion');
			$table->tinyInteger('status');
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
		Schema::table('ocurrencias', function(Blueprint $table)
		{
			$table->drop();
		});
	}

}
