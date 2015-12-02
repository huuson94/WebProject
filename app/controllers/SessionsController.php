<?php

class SessionsController extends BaseController {
    
    public function create(){
        if (!FEUsersHelper::isLogged()) {
            return View::make('frontend/signin_signup/login');
        } else {
            return Redirect::to('/');
        }
    }
    
    public function destroy(){
        if(FEUsersHelper::isLogged()){
            Session::flush('user');
        }
        return Redirect::to('/');
    }
	public function store(){
		$data=Input::all();
		$validator = FEUsersHelper::validateLoginInfo();
		if ($validator->fails()) {
			$messages = $validator->messages();
			echo json_encode($messages);
		}else{
			$user=Users::where('account',$data['account'])->get()->first();
			if (!$user){
				echo "fail: Not exists user";
			}else{
				$user=Users::where('account',$data['account'])->where('password',md5($data['password']))->first();
				if (!$user) {
					echo "fail: incorrect password";
				}else{
					Session::put('user',$user);
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
