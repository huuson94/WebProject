<?php

class FEUsersHelper{
    public static function isLogged(){
        if(Session::has('user') && Session::get('user')){
            return true;
        }else{
            return false;
        }
    }
    
    public static function isValidatedSignupInfo(){
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
}