<?php
define('AVATAR_DEFAULT_PATH','public/assets/images/ava_default.jpg');
class User extends Eloquent {
	protected $table = 'users';

	public function albums(){
		return $this->hasMany('Album','user_id');
	}
    public function images(){
        return $this->hasMany('Image','user_id');
    }

    public function blogs(){
        return $this->hasMany('Blog','user_id');
    }
    
    public function entries(){
        return $this->hasMany('Entry','user_id');
    }

    public function posts(){
        return $this->hasMany('Post','user_id');
    }

    public function follows(){
        return $this->hasmany('Follow','follower_id');
    }

    public function getAvatar(){
        if($this->avatar){
            return $this->avatar;
        }else{
            return AVATAR_DEFAULT_PATH;
        }
    }
    /**
     * Get following user list of current user
     * @return array Array of following user_id
     */
    public function getFollowingUsersId(){
        $result = array();
        $follows = Follow::where('follower_id',$this->id)->where('is_deleted',0)
                ->where('followed_id','!=',$this->id)
                ->get();
        
        foreach($follows as $follow){
            $result[] = $follow->followed_id;
        }
        return $result;
        
    }
}