<?php

class RiesgoTableSeeder extends Seeder {

	public function run() {
		DB::table('riesgos')->delete();

		$riesgos =
			[
				[
					'nombre'					=> 'Agoto la pila de la tarjeta madre',
					'descripcion'			=> 'se agoto la bateria a23 de la tarjeta madre del equipo',
					'impacto'				=> '1',
					'probabilidad'			=> '4',
					'costo'					=> 1000
				],
				[
					'nombre'					=> 'Caida del internet',
					'descripcion'			=> 'Se perdio el internet de la central',
					'impacto'				=> '3',
					'probabilidad'			=> '5',
					'costo'					=> 1000
				],
				[
					'nombre'					=> 'Caida del servicio de luz',
					'descripcion'			=> 'El servicio de luz tiene una caida inesperada',
					'impacto'				=> '5',
					'probabilidad'			=> '2',
					'costo'					=> 1000
				],
				[
					'nombre'					=> 'Falla en el sistema operativo',
					'descripcion'			=> 'Se daña el sistema operativo de los usuarios por instalaciones que no son necesarias o mal uso del equipo',
					'impacto'				=> '3',
					'probabilidad'			=> '5',
					'costo'					=> 1000
				]
			];

		DB::table('riesgos')->insert($riesgos);
	}

}
