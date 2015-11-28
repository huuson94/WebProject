<?php

class FEBlogsController extends ResourceBaseController{
    public function create() {
        
    }

    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index() {
        $user_id = Input::get('user_id');
        $blogs = Blog::orderBy('updated_at','DESC')->where('user_id',$user_id)->get();
        return View::make('frontend/blogs/create')->with('user', User::find($user_id))->with('blogs',$blogs);
    }

    public function show($id) {
        
    }

    public function store() {
        $datas = Input::all();
        $blog = new Blog;
        $blog->content = $datas['content'];
        $blog->user_id = Session::get('user')['id'];
        $blog->privacy = $datas['privacy'];
        $blog->save();
        return Redirect::back();
    }

    public function update($id) {
        
    }

}