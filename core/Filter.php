<?php

namespace App\Core;


class Filter {

    public static function filterInput($input, $type){
    
        if($type === 'text'){

            $input = strip_tags($input);
            $input = trim($input);
            $input = ucfirst(strtolower($input));
            return $input;
    
        }elseif($type === 'password'){
            
            $input = strip_tags($input);
            return $input;
    
        }elseif($type === 'email'){
            $input = trim($input);
            $input = filter_var($input, FILTER_SANITIZE_EMAIL);
            return $input;  
        }
    
        return $input;
    
    }
}