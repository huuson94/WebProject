<?php

class BEUsersHelper {

    public static function isExistedUser() {
        $data = Input::all();
        $user1 = User::where('account', $data['account'])->first();
        $user2 = User::where('email', $data['email'])->first();
        $messages = array();
        $status = false;
        if ($user1) {
            Session::flash('signup_status', false);
            $messages[] = "UserName is existed";
            $status = true;
        }
        if ($user2) {
            Session::flash('signup_status', false);
            $messages[] = 'Email existed';
            $status = true;
        }
        Session::flash('messages', $messages);
        return $status;
    }

    public static function saveNewUser() {
        $data = Input::all();
        $upload_folder = AVATAR_PATH . '/' . uniqid(date('ymdHisu'));
        $new = new User;
        $new->name = $data['name'];
        $new->account = $data['account'];
        $new->password = $data['password'];
        $new->email = $data['email'];
        $new->phone = $data['phone'];
        $new->address = $data['address'];
        if ($data['avatar']) {
            $name = $data['avatar']->getFilename() . uniqid() . "." . $data['avatar']->getClientOriginalExtension();
            $new->avatar = 'public/' . $upload_folder . "/" . $name;
            $data['avatar']->move(public_path() . "/" . $upload_folder, $name);
        } else {
            $new->avatar = DEFAULT_AVATAR_PATH;
        }
        if ($new->save()) {
            return $new;
        } else {
            return false;
        }
    }

    public static function isLogged() {
        if (Session::has('user')) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin() {
        if(BEUsersHelper::isLogged()){
            $currrent_user_id = Session::get('user')['id'];
            $current_user = User::find($currrent_user_id);
            if ($current_user->is_admin == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function isCurrentUser($id){
        if(FEUsersHelper::isLogged()){
            if($id == Session::get('current_user')){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function validateUser(){
        $input = array(
            'fullname' => Input::get('fullname'),
            'is_admin' => Input::get('is_admin'),
        );
        $rule = array(
            'fullname' => 'required'
        );
        $validator = \Validator::make($input, $rule);
        if ($validator->fails()) {
            Session::flash('messages',$validator->messages()->toArray());
            return false;
            }
            return true;
    }
    
   
}
