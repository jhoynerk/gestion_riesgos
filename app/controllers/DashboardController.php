<?php

class DashboardController extends BaseController {

	public $restful = true;

	public function getIndex()
	{
		return View::make('dashboard.index');
	}

}
