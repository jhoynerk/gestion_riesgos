<?php

class OcurrenciaController extends BaseController {

	public $restful = true;

	/*public $status = [
							1 => 'En Revisión',
							2 => 'Arreglado',
							3 => 'Perdida',
							4 => '']*/

	public function index()
	{
		$ocurrencias = Ocurrencia::with('riesgo', 'user_responsable', 'user_registro')->get();
		return View::make('ocurrencia.index', compact('ocurrencias'));
	}

	public function create()
	{
		$riesgo = Riesgo::All()->lists('nombre', 'id');
		$users = User::fullName();
		return View::make('ocurrencia.create', compact('riesgo', 'users'));
	}

	public function store()
	{
		$ocurrencia = Ocurrencia::create(Input::all());
		$ocurrencia->user_registro_id = Auth::id();
		$ocurrencia->save();
		Session::flash('message', 'Se ha registrado una ocurrencia');
		return Redirect::action('admin.ocurrencia.index');
	}

	public function show($id)
	{
		$ocurrencia = Ocurrencia::findOrFail($id);
		$riesgo = Riesgo::All()->lists('nombre', 'id');
		$users = User::fullName();
		return View::make('ocurrencia.update', compact('ocurrencia', 'riesgo', 'users'));
	}

	public function update($id)
	{
		$ocurrencia = Ocurrencia::findOrFail($id);

		$ocurrencia->fill(Input::all());
		$ocurrencia->save();
		Session::flash('message', 'Se ha modificado la ocurrencia: <b> '.$ocurrencia->riesgo->nombre.'</b>');
		return Redirect::action('admin.ocurrencia.index');
	}

	public function tabla($riesgo_id)
	{
		$ocurrencias = Ocurrencia::whereriesgo_id($riesgo_id)->with('riesgo', 'user_responsable', 'user_registro')->orderBy('fecha_error')->get();
		$riesgo = Riesgo::whereid($riesgo_id)->first();
		return View::make('ocurrencia.tabla', compact('ocurrencias', 'riesgo'));
	}

	public function beforeReporte()
	{
		$riesgos = Riesgo::All()->lists('nombre', 'id');
		return View::make('ocurrencia.list_reporte', compact('riesgos'));
	}

	public function showReporte()
	{
		if(is_null(Input::get('riesgos'))){
			$ocurrencias = Ocurrencia::with('riesgo', 'user_responsable', 'user_registro')->orderBy('riesgo_id')->orderBy('fecha_error');
		}else{
			$ocurrencias = Ocurrencia::with('riesgo', 'user_responsable', 'user_registro')->whereIN('riesgo_id', Input::get('riesgos'))->orderBy('riesgo_id')->orderBy('fecha_error');
		}
		if(Input::get('fecha_desde') == '' AND Input::get('fecha_hasta') == '' ){
			$ocurrencias = $ocurrencias->get();
		}else{
			if(Input::get('fecha_desde') != '' AND Input::get('fecha_hasta') == '' )
				$ocurrencias = $ocurrencias->where('fecha_error', '>' , Input::get('fecha_desde'))->get();
			if(Input::get('fecha_desde') == '' AND Input::get('fecha_hasta') != '' )
				$ocurrencias = $ocurrencias->where('fecha_error', '<',  Input::get('fecha_hasta'))->get();
			if(Input::get('fecha_desde') != '' AND Input::get('fecha_hasta') != '' )
				$ocurrencias = $ocurrencias->where('fecha_error', '>' , Input::get('fecha_desde'))->where('fecha_error', '<',  Input::get('fecha_hasta'))->get();
		}

		$html = View::make('reportes.reporte', compact('ocurrencias'));

		PDF::load(utf8_decode($html), 'letter', 'landscape')->download('certificado');
	}

	public function editar($id)
	{
		$ocurrencia = Ocurrencia::findOrFail($id);
		$riesgo = Riesgo::All()->lists('nombre', 'id');
		$users = User::fullName();
		return View::make('ocurrencia.editar', compact('ocurrencia', 'riesgo', 'users'));
	}

}
