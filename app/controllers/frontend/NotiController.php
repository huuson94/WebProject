<?php

/**
* 
*/
class NotiController extends BaseController {
	public function updateCheckedTime(){
		$user_id = Session::get('user')['id'];
		$user = User::find($user_id)->get();
		$user->noti_checked = 
	}
}