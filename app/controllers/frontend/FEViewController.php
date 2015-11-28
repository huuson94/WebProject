<?php

class FEViewController extends BaseController {

	public function getIndex(){
		$entries = $this->getViewDatas($user_id = null);
        
        return View::make('frontend/index')->with('entries',$entries);
    }
    
    private function getViewDatas($user_id = null){
        if($user_id){
            $entries = $this->getPosts('Công khai')
                ->union($this->getBlogs("Công khai")->getQuery())
                ->orderBy('updated_at','DESC')->where('user_id',$user_id)->get();
        }else{
            $entries = $this->getPosts('Công khai')
                ->union($this->getBlogs("Công khai")->getQuery())
                ->orderBy('updated_at','DESC')->get();
        }
        return $entries;
    }
    
    private function getPosts($name = "Công khai"){
        $privacy = Privacy::where('name',$name)->get()->first();
        if($privacy){
            return Post::orderBy('updated_at','DESC')->where('privacy','=',$privacy->id);
        }else{
            return null;
        }
    }
    
    private function getBlogs($name = "Công khai"){
        $privacy = Privacy::where('name',$name)->get()->first();
        if($privacy){
            return Blog::orderBy('updated_at','DESC')->where('privacy','=',$privacy->id);
        }else{
            return null;
        }
    }
    
    
    public function getProfile($account){
        $user = User::where('account',$account)->get()->first();
        $entries = $this->getViewDatas($user->id);
        return View::make('frontend/profile/profile')->with('entries',$entries)->with('user',$user);
        
    }
    
}
