<?php

class FEImagesController extends ResourceBaseController{
    public function create() {
        
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
            $f->move('upload/' . $folder_user, $name);
            if ($x == 1) {
                $album['album_img'] = $name;
                $x = 0;
                $album->save();
            }

            list($width, $height) = getimagesize('upload/' . $folder_user . '/' . $name);

            $image = new Images;
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