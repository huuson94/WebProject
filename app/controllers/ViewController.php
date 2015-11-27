<?php

class ViewController extends BaseController {

	public function getIndex(){
		if (Session::has('user')) {
			return View::make('frontend/index');
		}
		return View::make('frontend/signin_signup/login');
	}
}
