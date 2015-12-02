<?php

class Follow extends Eloquent{
    protected $table = 'follows';
    
    public function follower(){
        return $this->belongsTo('User','follower_id');
    }
    
    public function followed(){
        return $this->belongsTo('User', 'followed_id');
    }
}