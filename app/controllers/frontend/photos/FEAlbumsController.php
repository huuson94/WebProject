<?php


class FEAlbumsController extends BaseController{
    public function create() {
        
    }

    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index($account) {
        $user = User::where('account',$account)->get()->first();
        if ($user && FEUsersHelper::isCurrentUser($user->id)) {
            $albums = Album::where('user_id','=',$user->id)->get();
            return View::make('frontend/photo/photo')
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