<?php

class RiesgoController extends BaseController {

	public $restful = true;

	protected $mapa_calor = [
									['y' => 5, 'x' => 1, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 5, 'x' => 2, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 5, 'x' => 3, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 5, 'x' => 4, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 5, 'x' => 5, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 4, 'x' => 1, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 4, 'x' => 2, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 4, 'x' => 3, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 4, 'x' => 4, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 4, 'x' => 5, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 3, 'x' => 1, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>'],
									['y' => 3, 'x' => 2, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 3, 'x' => 3, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 3, 'x' => 4, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 3, 'x' => 5, 'class' => 'danger', 'nivel' => 'Alto', 'msg' => 'Riesgo de nivel <b>ALTO</b>'],
									['y' => 2, 'x' => 1, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>'],
									['y' => 2, 'x' => 2, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>'],
									['y' => 2, 'x' => 3, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 2, 'x' => 4, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 2, 'x' => 5, 'class' => 'warning', 'nivel' => 'Medio' , 'msg' => 'Riesgo de nivel <b>Medio</b>'],
									['y' => 1, 'x' => 1, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>'],
									['y' => 1, 'x' => 2, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>'],
									['y' => 1, 'x' => 3, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>'],
									['y' => 1, 'x' => 4, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>'],
									['y' => 1, 'x' => 5, 'class' => 'success', 'nivel' => 'Bajo', 'msg' => 'Riesgo de nivel <b>Bajo</b>']
								];

	public function index()
	{
		$riesgos = Riesgo::all();
		View::share('riesgos', $riesgos);
		View::share('mapa_calor', $this->mapa_calor);
		return View::make('riesgo.list');
	}

	public function create()
	{
		return View::make('riesgo.create');
	}

	public function store()
	{
		$riesgo = Riesgo::create(Input::all());
		Session::flash('message', 'Se ha registrado el riesgo: <b> '.$riesgo->nombre.'</b>');
		return Redirect::action('admin.riesgo.index');
	}

	public function show($id)
	{
		$riesgo = Riesgo::findOrFail($id);
		return View::make('riesgo.update')->with('riesgo', $riesgo);
	}

	public function update($id)
	{
		$riesgo = Riesgo::findOrFail($id);

		$riesgo->fill(Input::all());
		$riesgo->save();
		Session::flash('message', 'Se ha modificado el riesgo: <b> '.$riesgo->nombre.'</b>');
		return Redirect::action('admin.riesgo.index');
	}

	public function destroy($id)
	{
		$riesgo = Riesgo::find($id);
		$riesgo->delete($id);
		Session::flash('message', 'Se ha eliminado el riesgo: <b> '.$riesgo->nombre.'</b>');
		return Redirect::action('admin.riesgo.index');
	}

	public function mapa()
	{
		$riesgos = Riesgo::all();
		View::share('riesgos', $riesgos);
		View::share('mapa_calor', $this->mapa_calor);
		return View::make('riesgo.mapa_calor');
	}

	public function ver($id)
	{
		$riesgo = Riesgo::findOrFail($id);
		View::share('riesgo', $riesgo);
		View::share('mapa_calor', $this->mapa_calor);
		return View::make('riesgo.view');
	}

}
