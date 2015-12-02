<?php

class Blog extends Eloquent{
    protected $table = 'blogs';
    
    public function user(){
        return $this->belongsTo('User','user_id');
    }
    
    public function privacy(){
        return $this->belongsTo('Privacy','privacy');
    }
    
    public function entry(){
        return Entry::where('entry_id',$this->id)->where('type',2)->get()->first();
    }
}