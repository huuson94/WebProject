<?php

class FEFollowsHelper{
    /**
     * Get id of follow relation
     * @param int $follower_id Id of Follower 
     * @param int $followed_id Id of Followed User
     * @return int id of follow relation
     */
    public static function getId($follower_id, $followed_id){
        $follow = Follow::where('follower_id',$follower_id)->where('followed_id',$followed_id)->get()->first();
        if($follow){
            return $follow->id;
        }else{
            return null;
        }
    }
}