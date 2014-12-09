<?php

class UsuarioController extends BaseController {

	public $restful = true;

	public function index()
	{
		$users = User::all();
		View::share('users', $users);
		View::share('roles', $this->roles);
		return View::make('user.list');
	}

	public function create()
	{
		View::share('roles', $this->roles);
		return View::make('user.create');
	}

	public function show($id)
	{
		$user = User::findOrFail($id);
		return View::make('user.update', compact('user'));
	}

	public function store()
	{
		$user = New User;
		if ($user->isValid(Input::all())){
			$user = New User();
			$user->nombre		= Input::get('nombre');
			$user->apellido	= Input::get('apellido');
			$user->cedula		= Input::get('cedula');
			$user->correo		= Input::get('correo');
			$user->password	= Input::get('password');
			$user->rol			= Input::get('rol');

			if($user->save()){
				Session::flash('message', 'No se ha registrado el usuario: <b> '.$user->nombre.'</b>');
				return Redirect::action('admin.usuario.index')->withInput();
			}else{
				Session::flash('message', 'Se ha registrado el usuario: <b> '.$user->nombre.'</b>');
				return Redirect::back();
			}
		}
		return Redirect::to(route('admin.usuario.create'))->withErrors($user->errors)->withInput();
	}


	public function update($id)
	{
		$user = User::find($id);
		// dd($user);
		if ($user->isValid(Input::all())){
			$user->nombre		= Input::get('nombre');
			$user->apellido	= Input::get('apellido');
			$user->cedula		= Input::get('cedula');
			$user->correo		= Input::get('correo');
			if(Input::get('password'))
				$user->password	= Input::get('password');
			$user->save();
			Session::flash('message', 'Se ha modificado el user: <b> '.$user->nombre .' '.$user->apellido.'</b> con correo: '.$user->correo);
			return Redirect::action('admin.usuario.index');
		}
		return Redirect::back()->withErrors($user->errors)->withInput();

	}

}
