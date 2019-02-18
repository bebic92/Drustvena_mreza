<?php

namespace App\Core;

use App\Core\App;

class Validation {

    public $errors = [];

    public $value;

    public $inputName;

    public function value($value){

        $this->value = $value;
        
        return $this;
    }

    public function inputName($inputName){

        $this->inputName = $inputName;
        
        return $this;
    }
   
    public function required(){

        if($this->value === null || $this->value === '' || empty($this->value)){
   
            $this->errors[$this->inputName][] = $this->inputName.' polje ne smije biti prazno';  
   
        }

        return $this;
   
    }

    public function min($min){

        if(is_string($this->value)){

            if(strlen($this->value) <= $min - 1){
                
                $this->errors[$this->inputName][] = $this->inputName. ' treba imati minimalno '.$min.' znakova';
            
            }

        }else{

            if($this->value <= $min -1){
                
                $this->errors[$this->inputName][] = $this->inputName. ' treba veći od broja '.$min;
            
            }

        }

        return $this;
    
    }


    public function max($max){

        if(is_string($this->value)){

            if(strlen($this->value) >= $max){
                
                $this->errors[$this->inputName][] = $inputName. ' treba imati maksimalno '.$max.' znakova';
            
            }

        }else{

            if($this->value >= $max){
                
                $this->errors[$this->inputName][] = $inputName. ' treba bit veći od broja '.$max;
            
            }

        }

        return $this;
    
    }

    public function equal($passwordConfirm){
        if($this->value !== $passwordConfirm){
            $this->errors[$this->inputName][] = $this->inputName. ' i ponovljena lozinka nisu jednake';
        }
        return $this;
    }

    public function email(){
        if(! filter_var($this->value, FILTER_VALIDATE_EMAIL)){
         
            $this->errors[$this->inputName][] = $this->inputName. ' nije u ispravnom formatu';   
        
        }
        return $this;
    }
    public function unique($table, $column){

        $result = App::get('queryBuilder')->findAll($table, $column, $this->value);
        if(! empty($result)){
            $this->errors[$this->inputName][] = 'Ova vrijedost već postoji u bazi podataka';
        }
        return $this;
    }
}