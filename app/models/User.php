<?php
class User extends Eloquent {
	protected $table = 'users';

	public function album(){
		return $this->hasMany('Album','user_id');
	}
}