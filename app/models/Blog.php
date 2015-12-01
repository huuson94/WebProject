<?php

class Blog extends Eloquent{
    protected $table = 'blogs';
    
    public function user(){
        return $this->belongsTo('User','user_id');
    }
    
    public function privacy(){
        return $this->belongsTo('Privacy','privacy');
    }
}