<?php
class Message extends Eloquent {
	protected $table = 'messages';

	public function sendUser(){
		return $this->belongsTo('User','s_user_id');
	}
	
    public function user(){
        return $this->belongsTo('User','s_user_id');
    }
    
    public function preview(){
        $content = $this->content;
        $content_words = explode(' ',trim($content));
        if(count($content_words) < 3){
            return implode(" ", $content_words);
        }else{
            return $content_words[0]." ".$content_words[1]." ".$content_words[2];
        }
    }
}