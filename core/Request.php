<?php

namespace App\Core;

class Request {

    public static function url(){

        return parse_url(trim($_SERVER['REQUEST_URI'], '/'), PHP_URL_PATH);
    
    }

    public static function method(){

        return $_SERVER['REQUEST_METHOD'];
    
    }

}