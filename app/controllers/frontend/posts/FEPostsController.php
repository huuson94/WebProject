<?php

class FEPostsController extends ResourceBaseController{
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
        
        $datas = Input::all();
        $post = new Post;
        $post->content = $datas['content'];
        $post->user_id = Session::get('user')['id'];
        $post->privacy = $datas['privacy'];
        $post->save();
        return Redirect::back()->with('message','Đăng thành công!');
    }

    public function update($id) {
        
    }

}