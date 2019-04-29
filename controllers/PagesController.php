<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PagesController {

    // public function __construct()
    // {
    //     if(!isset($_SESSION['isLoggedIn'])){

    //         return redirect('/login');
        
    //     } 
    // }

    public function home(){

        if(!isset($_SESSION['isLoggedIn'])){

            return redirect('/login');
        
        } 
        
        $user = User::findUser($_SESSION['email']);
        $posts = Post::all();
        $comments = Comment::all();
        $userPosts = Post::userPosts($user->id)[0];
        
        return view('index', [
            'user' => $user,
            'posts' => $posts,
            'comments' => $comments,
            'userPosts' => $userPosts
        ]);
            
    }

    // public function getComments(){

    //     // $_SESSION['comments'] = json_encode(App::get('queryBuilder')->findAll('comments', 'post_id', '11')); 
    //     return;
    
    // }

}