<?php

class FEBlogsController extends ResourceBaseController{
    public function create() {
        if(FEUsersHelper::isLogged()){
            return View::make('frontend/blogs/create')->with('user',Session::get('user'));
        }else{
            return Redirect::to('/');
        }
    }

    public function destroy($id) {
        $blog = Blog::find($id);
        if($blog && FEUsersHelper::isCurrentUser($blog->user->id)){
            FELikesHelper::delete($blog->getEntry()->id);
            FEEntriesHelper::delete($blog->id, 2);
            $blog->delete();
            return Redirect::to('blog?user_id='.$blog->user->id);
        }
        return Redirect::to('/');
        
    }

    public function edit($id) {
        $blog = Blog::find($id);
        if ($blog->privacy == 3 && !FEUsersHelper::isCurrentUser($blog->user->id)) {
            return Redirect::to('blog?user_id=' . $blog->user->id);
        } else {
            $blogs = Blog::where('user_id', $blog->user->id)->get();
            return View::make('frontend/blogs/edit')->with('blog', $blog)->with('blogs', $blogs)->with('user', $blog->user);
        }
    }

    public function index() {
        $user_id = Input::get('user_id');
        if(FEUsersHelper::isCurrentUser($user_id)){
            $blogs = Blog::orderBy('updated_at','DESC')->where('user_id',$user_id)->get();
        }else{
            $blogs = Blog::orderBy('updated_at','DESC')->where('user_id',$user_id)->where('privacy',1)->get();
        }
        return View::make('frontend/blogs/index')->with('user', User::find($user_id))->with('blogs',$blogs);
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
        $blog = Blog::find($id);
        if (FEUsersHelper::isCurrentUser($blog->user->id)) {
            $blog->title = Input::get('title');
            $blog->content = Input::get('content');
            $blog->privacy = Input::get('privacy');
            $blog->save();
            FEEntriesHelper::updatePrivacy($blog->id, 2, $blog->privacy);
            return Redirect::back();
        } else {
            return Redirect::to('/');
        }
    }

}