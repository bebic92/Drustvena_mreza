<?php

namespace App\Core;

class App {

    protected static $box = [];

    public static function bind($key, $value){

        static::$box[$key] = $value;
    
    }
    public static function get($key){

        if(! array_key_exists($key, static::$box)){

            throw new Exception('Nešto je pošlo po krivu');
        
        }

        return static::$box[$key];

    }    
        


}