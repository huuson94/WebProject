<?php

class Conversation extends Eloquent{
    protected $table = 'conversations';
    
    public function messages(){
        return $this->hasMany('Message', 'conversation_id');
    }
    
    public function getUser1(){
        return User::find($this->user1_id);
    }
    
    public function getUser2(){
        return User::find($this->user2_id);
    }
}