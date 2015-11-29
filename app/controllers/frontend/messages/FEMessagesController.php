<?php

class FEMessagesController extends ResourceBaseController{
    public function create() {
        
    }

    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index() {
        $user_id = Input::get('user_id');
        if(FEUsersHelper::isCurrentUser($user_id)){
            return View::make('frontend/messages/index')->with('user',User::find($user_id));
        }else{
            return Redirect::to('/');
        }
    }

    public function show($id) {
        
    }

    public function store() {
        
    }

    public function update($id) {
        
    }

}