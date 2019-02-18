<?php

namespace App\Models;

use App\Models\Model;


class User extends Model {


public static function findUser($email){
    
    $user = new static;

    return $user->query->findOne('users', 'email', $email);
}

public static function updateNumOfPosts($column, $value){
    
    $user = new static;
    
    $numOfPosts = $user->query->findOne('users', 'email', $_SESSION['email'])->numOfPosts;

    if($value > 0){
    
        $user->query->update('users', 
        [
            "{$column}" => $numOfPosts + $value
        ], 
        'email', 
        $_SESSION['email']);
    
    }

}
    
}