<?php

class FEBlogsController extends ResourceBaseController{
    public function create() {
        $blogs = Blog::orderBy('updated_at','DESC')->where('user_id',Session::get('user')['id'])->get();
        return View::make('frontend/blogs/create')->with('user', Session::get('user'))->with('blogs',$blogs);
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