<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\User;

class PagesController {

    public function __construct()
    {
        if(!$_SESSION['isLoggedIn']){

            return redirect('/login');
        
        }
        
    }

    public function home(){

        //$user = App::get('queryBuilder')->findOne('users', 'email', $_SESSION['email']);
        //$user = new User();
        $user = User::findUser($_SESSION['email']);
        
        return view('index', compact('user'));
    
    }

}