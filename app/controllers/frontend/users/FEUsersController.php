<?php

class FEUsersController extends ResourceBaseController{
    
    
    public function create(){
        if (!FEUsersHelper::isLogged()) {
            return View::make('frontend/signin_signup/signup');
        } else {
            return Redirect::to('/');
        }
    }
    
    public function store(){
        $data = Input::all();
        $validator = FEUsersHelper::validatedSignupInfo();
        if ($validator->fails()) {
            $messages = $validator->messages();
            echo json_encode($messages);
        } elseif(FEUsersHelper::isExistedUser('account')) {
            echo 'fail: exists account';
        }elseif(FEUsersHelper::isExistedUser('email')) {
            echo 'fail: exists email';
        }elseif ($data['password'] != $data['passwordcheck']) {
            echo 'fail: password check';
        } else {
            $user = new User;
            $user['fullname'] = $data['fullname'];
            $user['account'] = $data['account'];
            $user['password'] = md5($data['password']);
            $user['email'] = $data['email'];
            $user['avatar'] = 'public/assets/images/ava_default.jpg';
            $user['phone'] = $data['phone'];
            $user->about = "";
            $user->address = "";
            $user->save();
            Session::put('user', $user);
            echo 'success';
        }
    }
    
    public function destroy($id) {
        
    }

    public function edit($account) {
//        if (FEUsersHelper::isLogged()) {
//            return View::make('frontend/profile/info')->with('user', Session::get('user'));
//        } else {
//            return Redirect::to('/');
//        }
        $user = User::where('account',$account)->get()->first();
        return View::make('frontend/profile/info')->with('user', $user);
    }

    public function index() {
        $fullname = Input::get('fullname');
        if($fullname){
            $users = User::where('fullname','LIKE',"%$fullname%")->where('id','!=',Session::get('user')['id'])->get();
            return View::make('frontend/users/index')->with('users',$users)->with('user',User::find(Session::get('user')['id']));
        }
    }

    public function show($id) {
        
    }

    public function update($id) {
        $data = Input::all();
        $avatar = Input::file('avatar');
        if(FEUsersHelper::isCurrentUser($id)){
            $validator = FEUsersHelper::validateUpdateInfo();
            if ($validator->fails()) {
                $messages = $validator->messages();
                $errors = json_encode($messages);
                echo $errors;
            } else {
                $user = Users::where('account', $data['account'])->first();

                $user['fullname'] = $data['fullname'];
                $user['email'] = $data['email'];
                $user['phone'] = $data['phone'];
                $user['address'] = $data['address'];
                $user['about'] = $data['about'];
                if($avatar){
                    $upload_avatar_folder = 'avatar/'.$user->account."/";
                    $name= $avatar->getFilename().uniqid().".".$avatar->getClientOriginalExtension();
                    $avatar->move(public_path() ."/". $upload_avatar_folder,$name);
                    $user->avatar= 'public/'.$upload_avatar_folder.$name;
                }
                $user->save();
                Session::flush('user');
                Session::put('user',$user);
                echo json_encode('success');
                
            }
        }else{
            echo json_encode('fail');
        }
//        return false;
    }

    
//	// Process Sign Up Form
//	public function postDoSignUp(){
//		
//	}

//	//Process Update User Infomation
//	public function postUpdateInfo(){
//		$data=Input::all();
//        $validator = FEUsersHelper::validateUpdateInfo();
//		if($validator->fails()){
//			$messages = $validator->messages();
////			echo json_encode($messages);
//		}else{
//			$user=Users::where('account',$data['account'])->first();
//
//			$user['fullname']=$data['fullname'];
//			$user['email']=$data['email'];
//			$user['phone']=$data['phone'];
//			$user->save();
////			echo 'success';
//		}
//        return Redirect::to('/');
//	}

	public function Profile($user){
		
	}

	public function Photo($user){
		$this_user=Users::where('account',$user)->first();
		$album=Albums::where('user_id',$this_user['id'])->orderBy('created_at','desc')->get();
		if ($this_user) {
			return View::make('frontend/profile/photo')
						->with('user',$this_user)
						->with('albums',$album);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Info($user){
		$this_user=Users::where('account',$user)->first();
		if ($this_user) {
			return View::make('frontend/profile/info')->with('user',$this_user);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Blog($user){
		
	}

    
}