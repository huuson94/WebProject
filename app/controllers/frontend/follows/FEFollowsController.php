<?php

class FEFollowsController extends ResourceBaseController{
    public function create() {
        
    }

    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index() {
        $follower_id = Input::get('follower_id');
        if(!$follower_id){
            $follower_id = Session::get('user')['id'];
        }
        $follows = Follow::where('follower_id',$follower_id)->where('is_deleted',0)->get();
        return View::make('frontend/follows/index')->with('follows',$follows)->with('user', User::find($follower_id));
        
    }

    public function show($id) {
        
    }

    public function store() {
        $follower_id = Input::get('follower_id');
        $followed_id = Input::get('followed_id');
        $follow_id = FEFollowsHelper::getId($follower_id, $followed_id);
        if(!$follow_id){
            $follow = new Follow;
            $follow->follower_id = $follower_id;
            $follow->followed_id = $followed_id;
            $follow->save();
            echo $follow->id;
        }else{
            $follow = Follow::find($follow_id);
            $follow->is_deleted = 0;
            $follow->save();
            echo $follow->id;
        }
        
    }

    public function update($id) {
        $follow = Follow::find($id);
        if(FEUsersHelper::isCurrentUser($follow->follower->id)){
            $follow->is_deleted = 1;
            $follow->save();
            echo 'true';
        }else{
            echo 'false';
        }
    }

}