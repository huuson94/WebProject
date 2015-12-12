<?php

class FEImagesController extends ResourceBaseController{
    private $image_per_page = 10;
    
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
            if (FEUsersHelper::isCurrentUser($user->id)) {
                $images_d = Image::where('user_id', '=', $user->id);
            } else {
                $images_d = Image::where('user_id', '=', $user->id)->where('privacy', PrivaciesHelper::getId("Công khai"));
            }

            return View::make('frontend/photos/images/index')
                            ->with('user', $user)
                            ->with('images', $images_d->paginate($this->image_per_page));
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