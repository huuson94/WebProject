<?php

class Post extends Eloquent implements ExtendEntry{
    protected $table = 'posts';
    
    public function user(){
        return $this->belongsTo('User','user_id');
    }
    
    public function getEntry(){
        return Entry::where('entry_id',$this->id)->where('type',1)->get()->first();
    }
}