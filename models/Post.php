<?php

namespace App\Models;

use App\Models\Model;
use App\Core\App;

class Post extends Model {

    public static function all(){

        $sql = "SELECT posts.*, count(comments.post_id) as num_of_comments FROM posts LEFT JOIN comments ON posts.id=comments.post_id GROUP BY posts.id DESC";
        return App::get('queryBuilder')->querry($sql);
    
    }

    public static function userPosts($userId){

        $sql = "SELECT posts.*, count(posts.id) as num_of_posts FROM posts where posts.user_id = '{$userId}'";
        return App::get('queryBuilder')->querry($sql);
    
    }
}