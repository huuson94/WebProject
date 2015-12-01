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
        $blog = Blog::find($id);
        if($blog->privacy == 3 && !FEUsersHelper::isCurrentUser($blog->user->id)){
            return Redirect::to('blog?user_id='.$blog->user->id);
        }else{
            $blogs = Blog::where('user_id',$blog->user->id)->get();
            return View::make('frontend/blogs/show')->with('blog',$blog)->with('blogs',$blogs)->with('user',$blog->user);
        }
    }

    public function store() {
        $datas = Input::all();
        $blog = new Blog;
        if($datas['title']){
            $blog->title = $datas['title'];
        }else{
            $blog->title = "Không tiêu đề";
        }
        $blog->content = $datas['content'];
        $blog->user_id = Session::get('user')['id'];
        $blog->privacy = $datas['privacy'];
        $blog->save();
        FEEntriesHelper::save($blog->id, FEEntriesHelper::getId("Blog"), $blog->user_id, $blog->privacy);
        return Redirect::back();
    }

    public function update($id) {
        
    }

}