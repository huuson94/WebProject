<?php

class FEUsersHelper{
    /**
     * 
     * @param int  $id user_id to check
     * 
     */
    public static function isCurrentUser($id){
        if($id == Session::get('user')['id']){
            return true;
        }else{
            return false;
        }
    }
    
    public static function isLogged(){
        if(Session::has('user') && Session::get('user')){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 
     * @param string $field field in table to check. Default is account
     * @return boolean
     */
    public static function isExistedUser($field = 'account'){
        $data = Input::all();
        $user = Users::where($field, $data["$field"])->first();
        if ($user) {
                return true;
        }else{
            return false;
        }
    }
    
    public static function validateLoginInfo(){
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
        return $validator;
    }
    
    public static function validatedSignupInfo() {
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
        return $validator;
    }

    public static function validateUpdateInfo(){
        $data = Input::all();
        $validator = Validator::make(
                        array(
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                        ), array(
                    'fullname' => 'min:6|required',
                    'email' => 'email|required',
                    'phone' => 'numeric',
                        ), array(
                    'required' => 'Không được bỏ trống thông tin này',
                    'min' => 'Tối thiểu 6 ký tự',
                    'email' => 'Dữ liệu nhập vào có dạng example@domain.com',
                    'numeric' => 'Dữ liệu nhập vào chỉ gồm chữ số',
                        )
        );
        return $validator;
    }
    
    
    public static function getSuggestes(){
        $user_id = User::find(Session::get('user')['id'])->id;
        $following =  Follow::where('follower_id',$user_id)->where('is_deleted',0)->orderBy('updated_at','DESC')->get();
        $suggestes = array();
        foreach($following as $follow){
            $suggest_d =  Follow::where('follower_id',$follow->followed->id)->where('followed_id','!=',$user_id)
                    ->where('is_deleted',0)
                    ->orderBy('updated_at','DESC')->get();
            if($suggest_d->count() > 0){
                foreach($suggest_d as $suggest){
                    $suggestes[] =$suggest;
                }
            }
        }
        
        return $suggestes;
        
    }
}