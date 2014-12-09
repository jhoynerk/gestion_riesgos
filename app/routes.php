<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return Redirect::to('login');
});

Route::get('login', array('before' => 'guest', function() {
	return View::make('login');
}));

Route::post('login', function(){
	$userdata = array(
		'correo'			=> Input::get('email'),
		'password'		=> Input::get('password'),
	);
	if (Auth::attempt($userdata)){
		return Redirect::to('admin/dashboard');
	}else{
		return Redirect::to('login')->with('login_errors', true);
	}
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::back();
});

Route::Group(['before' => 'auth'], function(){
	Route::controller('admin/dashboard', 'DashboardController');
	Route::resource('admin/riesgo', 'RiesgoController',[
		'only' => ['index', 'create', 'show', 'store', 'update', 'destroy']
	]);

	Route::resource('admin/ocurrencia', 'OcurrenciaController',[
		'only' => ['index', 'create', 'show', 'store', 'update', 'destroy']
	]);

	Route::resource('admin/usuario', 'UsuarioController',[
		'only' => ['index', 'create', 'show', 'store', 'update', 'destroy']
	]);

	Route::get('admin/ocurrencia/editar/{id}',[
		'as' => 'admin.ocurrencia.editar',
		'uses' => 'OcurrenciaController@editar'
	]);

	Route::get('admin/riesgo/mapa/show', [
		'as' => 'admin.riesgo.mapa',
		'uses' => 'RiesgoController@mapa'
	]);

	Route::get('admin/riesgo/detalle/ver/{id}', [
		'as' => 'admin.riesgo.ver',
		'uses' => 'RiesgoController@ver'
	]);

	Route::get('admin/ocurrencia/tabla/show/{id}', [
		'as' => 'admin.ocurrencia.tabla',
		'uses' => 'OcurrenciaController@tabla'
	]);

	Route::get('admin/ocurrencia/show/reporte', [
		'as' => 'admin.ocurrencia.beforeReporte',
		'uses' => 'OcurrenciaController@beforeReporte'
	]);

	Route::post('admin/ocurrencia/showReporte', [
		'as' => 'admin.ocurrencia.showReporte',
		'uses' => 'OcurrenciaController@showReporte'
	]);

	// Route::controller('admin/usuario', 'UsuarioController');
	// Route::controller('admin/riesgo', 'RiesgoController');
});
