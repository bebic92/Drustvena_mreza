<?php

namespace App\Models;

use App\Models\Model;
use App\Core\App;


class Comment extends Model{

    public static function all(){

        $sql = "SELECT comments.*, users.firstName, users.lastName FROM comments LEFT JOIN users ON comments.user_id=users.id ORDER BY created_at DESC";
        return App::get('queryBuilder')->querry($sql);
    
    }

    public static function find($column, $parameter){
    
        $sql = "SELECT comments.*, users.firstName, users.lastName FROM comments LEFT JOIN users ON comments.user_id=users.id WHERE {$column} = '{$parameter}' ORDER BY created_at DESC";
        return App::get('queryBuilder')->querry($sql);
        
    }

}