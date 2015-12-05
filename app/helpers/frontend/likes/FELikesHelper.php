<?php

class FELikesHelper{
    
    /**
     * Get id of like
     * @param int $entry_id
     * @param int $user_id
     * @param boolean $is_deleted : whether query has is_deleted = 0 filter
     */
    public static function getId($entry_id, $user_id, $is_deleted = true){
        if(!$is_deleted){
            $like = Like::where('entry_id',$entry_id)->where('user_id',$user_id)->get()->first();
        }else{
            $like = Like::where('entry_id',$entry_id)->where('user_id',$user_id)
                    ->where('is_deleted','0')
                    ->get()->first();
        }
        if($like){
            return $like->id;
        }else{
            return null;
        }
    }
}