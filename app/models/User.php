<?php
define('AVATAR_DEFAULT_PATH','public/assets/images/ava_default.jpg');
class User extends Eloquent {
	protected $table = 'users';

	public function album(){
		return $this->hasMany('Album','user_id');
	}
    
    public function getAvatar(){
        if($this->avatar){
            return $this->avatar;
        }else{
            return AVATAR_DEFAULT_PATH;
        }
    }
}