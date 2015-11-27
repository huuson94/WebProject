<?php

class SessionController extends BaseController {

	public function postDoLogin(){
		$data=Input::all();
		$validator=Validator::make(
			array(
				'account'=>$data['account'],
				'password'=>$data['password']
			),
			array(
				'account'=>'required',
				'password'=>'required'
			),
			array(
				'required'=>'Yêu cầu thông tin đăng nhập',
			)
		);
		if ($validator->fails()) {
			$messages = $validator->messages();
			echo json_encode($messages);
		}else{
			$user=Users::where('account',$data['account'])->first();
			if (!$user){
				echo "fail: Not exists user";
			}else{
				$user=Users::where('account',$data['account'])->where('password',md5($data['password']))->first();
				if (!$user) {
					echo "fail: incorrect password";
				}else{
					Session::put('user',$user->toArray());
					echo "success";
				}
			}
		}
		
	}

	public function getLogout(){
		Session::flush();
		return Redirect::to('/');
	}

}
