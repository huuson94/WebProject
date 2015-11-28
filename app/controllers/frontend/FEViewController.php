<?php

class FEViewController extends BaseController {

	public function getIndex(){
		if (Session::has('user')) {
			return View::make('frontend/index');
		}
		return Redirect::to('login');
	}
}
