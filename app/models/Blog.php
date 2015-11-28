<?php

class Blog extends Eloquent{
    protected $table = 'blogs';
    
    public function user(){
        return $this->belongsTo('User','user_id');
    }
}