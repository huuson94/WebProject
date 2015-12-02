<?php

class FEPostsController extends ResourceBaseController{
    public function create() {
        
    }

    public function destroy($id) {
        $post = Post::find($id);
        if($post && FEUsersHelper::isCurrentUser($post->user->id)){
            $post->entry()->delete();
            $post->delete();
            echo 'true';
        }else{
            echo 'false';
        }
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
        FEEntriesHelper::save($post->id, FEEntriesHelper::getId("Post"), $post->user_id, $post->privacy);
        return Redirect::back()->with('message','Đăng thành công!');
    }

    public function update($id) {
        
    }

}