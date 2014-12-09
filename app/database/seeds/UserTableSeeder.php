<?php

class UserTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();

		$user =
			[
				[
					'cedula'		=> '12345678',
					'correo'		=> 'analista@test.com',
					'nombre'		=> 'jhoynerk',
					'apellido'	=> 'caraballo',
					'rol'			=> 0,
					'password'	=> Hash::make('test'),
				],
				[
					'cedula'		=> '12345679',
					'correo'		=> 'tecnico@test.com',
					'nombre'		=> 'Julio',
					'apellido'	=> 'Guevara',
					'rol'			=> 1,
					'password'	=> Hash::make('test'),
				],
				[
					'cedula'		=> '12345671',
					'correo'		=> 'evaluador@test.com',
					'nombre'		=> 'Prizni',
					'apellido'	=> 'Márquez',
					'rol'			=> 2,
					'password'	=> Hash::make('test'),
				]
			];

		DB::table('users')->insert($user);
	}

}
