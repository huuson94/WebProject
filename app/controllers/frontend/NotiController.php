<?php

/**
* 
*/
class NotiController extends BaseController {
	public function store(){
		$user_id = Session::get('user')['id'];
		$user = User::find($user_id);
		$user->noti_checked = date('Y-m-d H:m:s');
		$user->save();
		$result['status'] = 'success';
        echo json_encode($result);
	}
}