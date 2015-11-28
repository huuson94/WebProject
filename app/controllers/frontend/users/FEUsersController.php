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

        $validator = Validator::make(
                        array(
                    'fullname' => $data['fullname'],
                    'account' => $data['account'],
                    'password' => $data['password'],
                    'passwordcheck' => $data['passwordcheck'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                        ), array(
                    'fullname' => 'min:6|required',
                    'account' => 'min:6|required',
                    'password' => 'min:6|required',
                    'passwordcheck' => 'required',
                    'email' => 'email|required',
                    'phone' => 'numeric',
                        ), array(
                    'required' => 'Vui lòng nhập thông tin vào trường này',
                    'min' => 'Tối thiểu 6 ký tự',
                    'email' => 'Dữ liệu nhập vào có dạng example@domain.com',
                    'numeric' => 'Dữ liệu nhập vào chỉ gồm chữ số',
                        )
        );
        if ($validator->fails()) {
            $messages = $validator->messages();
            echo json_encode($messages);
        } else {
            $user = Users::where('account', $data['account'])->first();
            if ($user) {
                echo 'fail: exists account';
            } elseif ($data['password'] != $data['passwordcheck']) {
                echo 'fail: password check';
            } else {
                $user = new Users;
                $user['fullname'] = $data['fullname'];
                $user['account'] = $data['account'];
                $user['password'] = md5($data['password']);
                $user['email'] = $data['email'];
                $user['avatar'] = 'public/assets/images/ava_default.jpg';
                $user['phone'] = $data['phone'];
                $user->save();
                echo 'success';
            }
        }
    }
    
    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index() {
        
    }

    public function show($id) {
        
    }

    public function update($id) {
        
    }

    
	// Process Sign Up Form
	public function postDoSignUp(){
		
	}

	//Process Update User Infomation
	public function postUpdateInfo(){
		$data=Input::all();

		$validator=Validator::make(
			array(
				'fullname' => $data['fullname'],
				'email' => $data['email'],
				'phone' => $data['phone'],
			),
			array(
				'fullname' => 'min:6|required',
				'email' => 'email|required',
				'phone' => 'numeric',
			),
			array(
				'required' => 'Không được bỏ trống thông tin này',
				'min' => 'Tối thiểu 6 ký tự',
				'email' => 'Dữ liệu nhập vào có dạng example@domain.com',
				'numeric' => 'Dữ liệu nhập vào chỉ gồm chữ số',
			)
		);
		
		if($validator->fails()){
			$messages = $validator->messages();
			echo json_encode($messages);
		}else{
			$user=Users::where('account',$data['account'])->first();

			$user['fullname']=$data['fullname'];
			$user['email']=$data['email'];
			$user['phone']=$data['phone'];
			$user->save();
			echo 'success';
		}
	}

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
		$this_user=Users::where('account',$user)->first();
		if ($this_user) {
			return View::make('frontend/profile/blog')->with('user',$this_user);
		}else{
			return 'ko có user '.$user;
		}
	}

    
}