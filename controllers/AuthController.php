<?php

namespace App\Controllers;
use App\Core\Filter;
use App\Core\Validation;
use App\Models\User;
use App\Core\App;

class AuthController {


    public function __construct()
    {
        if(isset($_SESSION['isLoggedIn']) && $_SERVER['REQUEST_URI'] !== '/logout'){
           
            return redirect('/');
        
        }
    
    }
    public function showLogin(){

        return view('login-reg/login');   

    }

    public function showRegister(){

        return view('login-reg/register');

    }

    public function store(){

        $firstName = Filter::filterInput($_POST['firstName'], 'text');
        $lastName = Filter::filterInput($_POST['lastName'], 'text');   
        $username = Filter::filterInput($_POST['username'], 'text');
        $email = Filter::filterInput($_POST['email'], 'email');
        $password = Filter::filterInput($_POST['password'], 'password');
        $confirmPassword = Filter::filterInput($_POST['confirmPassword'], 'password');

        $errors = $this->validateInputs([

                'firstName' => $firstName,
                'lastName' => $lastName,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'confirmPassword' => $confirmPassword
            
        ]);

        if(!empty($errors)){

            return view('login-reg/register', [
                'errors' => $errors,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'username' => $username,
                'email' => $email,
            ]);   
        
        }

        User::create([

            'firstName' => $firstName,
            'lastName' => $lastName,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
            
        ]);
            return redirect('/login');

    }

    private function validateInputs($inputs){

        $validate = new Validation();
        $validate->inputName('Ime')->value($inputs['firstName'])->required()->min(1);
        $validate->inputName('Prezime')->value($inputs['lastName'])->required()->min(1);
        $validate->inputName('Korisničko ime')->value($inputs['username'])->required()->min(1)->unique('users','username');
        $validate->inputName('Email')->value($inputs['email'])->required()->unique('users','email');
        $validate->inputName('Lozinka')->value($inputs['password'])->required()->min(5)->equal($inputs['confirmPassword']);
        $validate->inputName('Potvrda lozinke')->value($inputs['confirmPassword'])->required();
        if(! empty($validate->errors)){
 
            return $validate->errors;
 
        }
 
        return [];
 
    }

    public function login(){
        
        $error = '';
        $email = Filter::filterInput($_POST['email'], 'email');
        $password = Filter::filterInput($_POST['password'], 'password');
        $user = App::get('queryBuilder')->findAll('users','email', $email);

        if(!empty($user)){
            if(password_verify($password, $user[0]->password)){
                    
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['username'] = $user[0]->username;
                $_SESSION['email'] = $user[0]->email;
                
                return redirect('/');
            }
        }

        $error = 'Lozinka i email se ne slažu ili ne postoje u bazi';
        return view('login-reg/login', compact('error'));
    }

    public function logout(){

        unset($_SESSION['isLoggedIn']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);

        return redirect('/login');        
    }
}