<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	
	public function __construct() {
		$privacies = Privacy::where('is_deleted',0)->get();
		View::share('privacies',$privacies);
		if(Session::has('user') && User::find(Session::get('user')['id'])){
			$notifications = $this->getNotification();
			View::share('noti_data',$notifications);
		}
	}

	public function getNotification(){
		$current_user_id = Session::get('user')['id'];
		$last_time = User::where('id', $current_user_id)->get()->first()->noti_checked;
		$noti_data['new_albums'] = $this->getNewAlbumsNotification($current_user_id,$last_time);
		$noti_data['blogs'] = $this->getNewBlogsNotification($current_user_id,$last_time);
		$noti_data['follows'] = $this->getNewFollowsNotification($current_user_id,$last_time);
		$noti_data['messages'] = $this->getNewMessagesNotification($current_user_id,$last_time);
		$noti_data['post'] = $this->getNewPostsNotification($current_user_id,$last_time);
		$noti_data['noti_count'] = count($noti_data['new_albums']) + count($noti_data['blogs']) + count($noti_data['follows']) + count($noti_data['messages']) + count($noti_data['post']);
		return $noti_data;

	}
	public function getNewAlbumsNotification($current_user_id, $last_time){
		$followed_users = Follow::where('follower_id','=',$current_user_id)->select('followed_id')->get();
		$new_albums = Album::whereIn('user_id',$followed_users->fetch('followed_id')->toArray())->where('privacy',1)->where('created_at','>=', $last_time)->get();
		return $new_albums?$new_albums:array();
	}

	public function getNewBlogsNotification($current_user_id, $last_time){
		$followed_users = Follow::where('follower_id','=',$current_user_id)->select('followed_id')->get();
		$new_blogs = Blog::whereIn('user_id',$followed_users->fetch('followed_id')->toArray())->where('privacy',1)->where('created_at','>=', $last_time)->get();
		return $new_blogs?$new_blogs:array();
	}

	public function getNewFollowsNotification($current_user_id, $last_time){
		$new_followed = Follow::where('followed_id','=',$current_user_id)->where('updated_at','>=',$last_time)->get();
		return $new_followed?$new_followed:array();
	}
	public function getNewMessagesNotification($current_user_id, $last_time){
		$followed_users = Follow::where('follower_id','=',$current_user_id)->select('followed_id')->get();
		$new_messages = Message::whereIn('s_user_id',$followed_users->fetch('followed_id')->toArray())->where('created_at','>=', $last_time)->get();
		return $new_messages?$new_messages:array();
	}
	public function getNewPostsNotification($current_user_id, $last_time){
		$followed_users = Follow::where('follower_id','=',$current_user_id)->select('followed_id')->get();
		$new_posts = Post::whereIn('user_id',$followed_users->fetch('followed_id')->toArray())->where('privacy',1)->where('created_at','>=', $last_time)->get();
		return $new_posts?$new_posts:array();
	}
}
