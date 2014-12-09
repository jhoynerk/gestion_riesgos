<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function isValid($data)
	{
		$rules = array(
						'nombre'		=> 'required|min:4|max:40',
						'apellido'	=> 'required|min:4|max:40',
						'cedula'		=> 'required|numeric|unique:users',
						'correo'		=> 'required|email|unique:users',
						'password'	=> 'min:5|confirmed'
					);

		if ($this->exists)
		{
			$rules['correo'] .= ',correo,' . $this->id;
			$rules['cedula'] .= ',cedula,' . $this->id;
		}
		else
		{
			$rules['password'] .= '|required';
		}
		$validator = Validator::make($data, $rules);

		if ($validator->passes())
		{
			return true;
		}
		$this->errors = $validator->errors();
		return false;
	}

	public static function fullName(){
		foreach (User::whererol(1)->get() as $key => $value) {
			$fullName[$value->id] = $value->nombre .' '. $value['apellido'];
		}
		return $fullName;
	}

}
