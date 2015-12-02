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
        if($user){
            if (FEUsersHelper::isCurrentUser($user->id)) {
                $albums_d = Album::where('user_id','=',$user->id);
            } else {
                $albums_d = Album::where('user_id','=',$user->id)->where('privacy',  PrivaciesHelper::getId("Công khai"));
            }

            return View::make('frontend/photos/albums/index')
                                ->with('user', $user)
                                ->with('albums', $albums_d->get());
        }else{
            return Redirect::to('/');
        }
    }

    public function show($id) {
        $album = Album::find($id);
        if(FEUsersHelper::isCurrentUser($album->user->id)){
            return View::make('frontend/photos/albums/show')->with('album',$album)->with('user',$album->user);
        }else{
            return Redirect::to('/');
        }
        

    }

    public function store() {
        $data = Input::all();
        $album = new Album;
        $album['title'] = $data['title'];
        $album['user_id'] = Session::get('user')['id'];
        $album['privacy'] = $data['privacy'];
        
        $file = Input::file('img');
        $folder_user = Session::get('user')['account'];
        $x = 1;
        foreach ($file as $key => $f) {
            $name = uniqid() . '.jpg';
            $f->move('public/upload/' . $folder_user, $name);
            if ($x == 1) {
                $album['album_img'] = $name;
                $x = 0;
                $album->save();
                FEEntriesHelper::save($album->id, FEEntriesHelper::getId("Album"), $album->user_id, $album->privacy);
            }
            
            list($width, $height) = getimagesize('public/upload/' . $folder_user . '/' . $name);

            $image = new Image;
            $image['path'] = $name;
            $image['user_id'] = Session::get('user')['id'];
            $image['album_id'] = $album['id'];
            $image['width'] = $width;
            $image['height'] = $height;
            $image->save();
        }
        $data = Input::all();
        echo json_encode($file);
    }

    public function update($id) {
        
    }

}