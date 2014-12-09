<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */


	protected $roles = [0 => 'Analista de Riesgos',
							  1 => 'Técnico de Operaciones',
							  2 => 'Evaluador de Riesgos'];

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			return View::make($this->layout);
		}
	}

}
