<?php

class FEUsersHelper{
    public static function isLogged(){
        if(Session::has('user') && Session::get('user')){
            return true;
        }else{
            return false;
        }
    }
}