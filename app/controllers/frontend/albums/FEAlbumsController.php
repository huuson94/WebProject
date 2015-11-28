<?php


class FEAlbumsController extends BaseController{
    public function create() {
        
    }

    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index() {
        $user_id = Input::get('user_id');
        $user = User::find($user_id);
        if ($user) {
            $albums = Album::where('user_id','=',$user->id)->get();
            return View::make('frontend/albums/index')
                            ->with('user', $user)
                            ->with('albums', $albums);
        } else {
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