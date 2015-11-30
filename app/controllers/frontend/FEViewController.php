<?php

class FEViewController extends BaseController {

	public function getIndex(){
        if(FEUsersHelper::isLogged()){
            $entries = $this->getViewIndexDatas();
            return View::make('frontend/index')->with('entries',$entries);
        }else{
            return Redirect::to('login');
        }
    }
    
    
    private function getViewIndexDatas(){
        $current_user_id = Session::get('user')['id'];
        $owners_id = Follow::where('follower_id',$current_user_id)->get(['followed_id'])->toArray();
        array_walk($owners_id, function( &$value, $key){
            $value = $value['followed_id'];
        });
        $owners_id[] = $current_user_id;
        $privacy = Privacy::where('name',"Công khai")->get()->first();
        $entries = Entry::whereIn('user_id',$owners_id)
                        ->orderBy('updated_at', 'DESC')->paginate(3);
        $datas = array();
        
        foreach ($entries as $index => $entry) {
            if (FEUsersHelper::isCurrentUser($entry->user_id)) {
                $datas[] = $this->getEntry($entry->entry_id, $entry->type, null);
            } else{
                $datas[] = $this->getEntry($entry->entry_id, $entry->type, $privacy->id);
            } 
        }
        return $datas;
    }
    
    private function getViewProfileDatas($user_id) {
        $privacy = Privacy::where('name',"Công khai")->get()->first();
        $datas = array();
        if (FEUsersHelper::isCurrentUser($user_id)) {
            $entries = Entry::where('user_id',$user_id)
                        ->orderBy('updated_at', 'DESC')->paginate(3);
            
            foreach ($entries as $index => $entry) {
                $datas[] = $this->getEntry($entry->entry_id, $entry->type, null);
            }
        } else {
            $entries = Entry::where('user_id',$user_id)->where('privacy',$privacy->id)
                        ->orderBy('updated_at', 'DESC')->paginate(3);
            
            foreach ($entries as $index => $entry) {
                $datas[] = $this->getEntry($entry->entry_id, $entry->type, $privacy->id);
            }
        }
        return $datas;
    }

    private function getEntry($entry_id, $type, $privacy = 1){
        
        $type_name = EntryType::find($type)->type;
        
        if ($privacy == null) {
            $entry = $type_name::find($entry_id);
        } else {
            $entry = $type_name::where('id', $entry_id)->where('privacy', '=', $privacy)->get()->first();
            
        }
        if ($entry) {
            return $entry;
        } else {
            return null;
        }
    }
        
//    private function getPost($post_id,  $privacy = 1){
//        if($privacy == null){
//            $post = Post::find($post_id);
//        }else{
//            $post =  Post::where('id',$post_id)->where('privacy','=',$privacy)->get()->first();
//        }
//        if($post){
//            return $post;
//        }else{
//            return null;
//        }
//        
//    }
//    
//    private function getBlog($blog_id,  $privacy = 1){
//        if($privacy == null){
//            $blog = Blog::find($blog_id);
//        }else{
//            $blog =  Blog::where('id',$blog_id)->where('privacy','=',$privacy)->get()->first();
//        }
//        if($blog){
//            return $blog;
//        }else{
//            return null;
//        }
//    }
//    
//    private function getAlbum($album_id = null, $privacy = 1){
//        if($privacy == null){
//            $album = Album::find($album_id);
//        }else{
//            $album =  Album::where('id',$album_id)->where('privacy','=',$privacy)->get()->first();
//        }
//        if($album){
//            return $album;
//        }
//        return null;
//    }
    
    public function getProfile($account){
        $user = User::where('account',$account)->get()->first();
        $entries = $this->getViewProfileDatas($user->id);
        return View::make('frontend/profile/profile')->with('entries',$entries)->with('user',$user);
        
    }

    public function getFollowing($account){
        
    }
    
}
