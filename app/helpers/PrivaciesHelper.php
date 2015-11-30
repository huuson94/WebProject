<?php

class PrivaciesHelper{
    public static function getId($name = "Công khai"){
        return Privacy::where("name", $name)->get()->first()->id;
    }
}