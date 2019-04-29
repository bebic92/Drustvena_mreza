<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Core\Validation;
use App\Core\Filter;

class CommentsController {

    public function __construct()
    {
        if(!$_SESSION['isLoggedIn']){

            return redirect('/login');
        
        }
    }
    
    public function store(){

        $postId = $_POST['postId'];
        $comment = Filter::filterInput($_POST['comment'], 'text');

        $errors = $this->validateInputs([
            'comment' => $comment
        ]);

        if(! empty($errors)){
            return view('/', compact('errors'));
        }
        
        Comment::create([
            'post_id' => $postId,
            'body' => $comment,
            'user_id' => $_SESSION['userId']
        ]);

        return redirect('/');   
    
    }

    private function validateInputs($inputs){

        $validation = new Validation();
        $validation->inputName('Komentar')->value($inputs['comment'])->required()->min(1);
        if(! empty($validation->errors)){
 
            return $validation->errors;
 
        }
 
        return [];
 
    }

}
