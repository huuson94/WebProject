<?php

class FEViewController extends BaseController {

	public function getIndex(){
		$entries = $this->getViewDatas($user_id = null, "Công khai");
        
        return View::make('frontend/index')->with('entries',$entries);
    }
    
    private function getViewDatas($user_id = null,$name = "Công khai"){
        $privacy = Privacy::where('name',$name)->get()->first();
        if($privacy){
            $entries = $this->getPosts($user_id, $privacy->id)
                        ->union($this->getBlogs($user_id, $privacy->id)->getQuery())
                        ->orderBy('updated_at','DESC')->get();
        }
        return $entries;
    }
    
    private function getPosts($user_id = null, $privacy_id = 1){
        $posts =  Post::orderBy('updated_at','DESC')->where('privacy','=',$privacy_id);
        if($user_id){
            $posts = $posts->where('user_id',$user_id);
        }
        return $posts;
    }
    
    private function getBlogs($user_id = null, $privacy_id = 1){
        $blogs =  Blog::orderBy('updated_at','DESC')->where('privacy','=',$privacy_id);
        if($user_id){
            $blogs = $blogs->where('user_id',$user_id);
        }
        return $blogs;
    }
    
    
    public function getProfile($account){
        $user = User::where('account',$account)->get()->first();
        $entries = $this->getViewDatas($user->id);
        return View::make('frontend/profile/profile')->with('entries',$entries)->with('user',$user);
        
    }

    public function getFollowing($account){
        $user = User::where('account',$account)->get()->first();
        $entries = $this->getViewDatas($user->id);
        return View::make('frontend/profile/following')->with('entries',$entries)->with('user',$user);
    }
    
}
