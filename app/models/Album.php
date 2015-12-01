<?php
class Album extends Eloquent {
	protected $table = 'albums';

	public function images(){
		return $this->hasMany('Image','album_id');
	}
	public function user(){
		return $this->belongsTo('User','user_id');
	}
    
    public function privacy(){
        return $this->belongsTo('Privacy','privacy');
    }
}