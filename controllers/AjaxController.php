<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class AjaxController {

    public static function showComments(){

        $user = User::findUser($_SESSION['email']);
        $posts = Post::all();
        $comments = Comment::find('post_id', $_GET['postId']);
        return view('ajax/showComments', [
            'user' => $user,
            'posts' => $posts,
            'comments' => $comments
        ]);
        }

}
