<?php

class FEUserProfileController extends BaseController{
    public function show(){
//        return View::make('frontend/profile/timeline')->with('user', Session::get('user'));
    }
    
    public function edit(){
        if(FEUsersHelper::isLogged()){
//            return View::make('frontend/profile/timeline')->with('user', Session::get('user'));
        }
    }
}