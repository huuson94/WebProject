<?php

class FEViewController extends BaseController {

	public function getIndex(){
        if(FEUsersHelper::isLogged()){
            $current_user_id = Session::get('user')['id'];
            $entries = $this->getViewDatas($current_user_id);
            return View::make('frontend/index')->with('entries',$entries);
        }else{
            return Redirect::to('login');
        }
    }
    
    private function getViewDatas($current_user_id) {
        
        $owners_id = Follow::where('follower_id',$current_user_id)->get(['followed_id'])->toArray();
        array_walk($owners_id, function( &$value, $key){
            $value = $value['followed_id'];
        });
        $owners_id[] = $current_user_id;
        $privacy = Privacy::where('name',"Công khai")->get()->first();
        if ($privacy) {
          $entries = Entry::orderBy('updated_at', 'DESC')->get();
            $datas = array();
            foreach ($entries as $index => $entry) {
                if( in_array($entry->user_id, $owners_id)){
                    if ($entry->type == FEEntriesHelper::getId("Post")) {
                        $datas[] = $this->getPost($entry->entry_id, $privacy->id);
                    }elseif($entry->type == FEEntriesHelper::getId("Blog")){
                        $datas[] = $this->getBlog($entry->entry_id, $privacy->id);
                    }elseif($entry->type == FEEntriesHelper::getId("Album")){
                        $datas[] = $this->getAlbum($entry->entry_id, $privacy->id);
                    }
                }
            }
            return $datas;
        }
    }

    private function getPost($post_id,  $privacy = 1){
        $post =  Post::where('id',$post_id)->where('privacy','=',$privacy)->get()->first();
        if($post){
            
            return $post;
        }else{
            return null;
        }
    }
    
    private function getBlog($blog_id,  $privacy = 1){
        $blog =  Blog::where('id',$blog_id)->where('privacy','=',$privacy)->get()->first();
        if($blog){
            return $blog;
        }else{
            return null;
        }
    }
    
    private function getAlbum($album_id = null, $privacy = 1){
        $album =  Album::where('id',$album_id)->where('privacy','=',$privacy)->get()->first();
        if($album){
            return $album;
        }
        return null;
    }
    
    public function getProfile($account){
        $user = User::where('account',$account)->get()->first();
        $entries = $this->getViewDatas($user->id);
        return View::make('frontend/profile/profile')->with('entries',$entries)->with('user',$user);
        
    }

    public function getFollowing($account){
        
    }
    
}
