<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Core\Validation;
use App\Core\Filter;

class PostsController {

    public function __construct()
    {
        if(!$_SESSION['isLoggedIn']){

            return redirect('/login');
        
        }
        
    }

    public function store(){

        $post = Filter::filterInput($_POST['post'], 'text');
        $errors = $this->validateInputs($post);
        $user = User::findUser($_SESSION['email']);

        if(!empty($errors)){

            return view('/', [
                'errors' => $errors,
            ]);   
        
        }
        
        Post::create([
            'body' => $post,
            'added_by' => $user->firstName.' '.$user->lastName,
            'user_to' => '',
        ]);
        
        User::updateNumOfPosts('numOfPosts', 1);

        return redirect('/');

    }

    private function validateInputs($inputs){

        $validation = new Validation();
        $validation->inputName('Ime')->value($inputs['post'])->required()->min(1);
        if(! empty($validation->errors)){
 
            return $validation->errors;
 
        }
 
        return [];
 
    }

}