<?php

class FEUserInformationsController extends BaseController{
    public function edit(){
        if (FEUsersHelper::isLogged()) {
            return View::make('frontend/profile/info')->with('user', Session::get('user'));
        } else {
            return Redirect::to('/');
        }
    }
}

