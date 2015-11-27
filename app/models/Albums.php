<?php
class Albums extends Eloquent {
	protected $table = 'albums';

	public function images(){
		return $this->hasMany('Images','album_id');
	}
	public function user(){
		return $this->belongsTo('Users','user_id');
	}
}