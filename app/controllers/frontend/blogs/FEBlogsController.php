<?php

class FEBlogsController extends ResourceBaseController{
    public function create() {
        return View::make('frontend/blogs/create')->with('user', Session::get('user'));
    }

    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index() {
        
    }

    public function show($id) {
        
    }

    public function store() {
        $datas = Input::all();
        
    }

    public function update($id) {
        
    }

}