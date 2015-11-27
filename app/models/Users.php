<?php
class Users extends Eloquent {
	protected $table = 'users';

	public function album(){
		return $this->hasMany('Albums','user_id');
	}
}