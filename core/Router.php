<?php

namespace App\Core;

class Router {

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];



    public function get($url, $controller){

        $this->routes['GET'][$url] = $controller;

    }

    public function post($url, $controller){

        $this->routes['POST'][$url] = $controller;
        
    }

    public static function load($routes){
        
        $router = new static;

        require $routes;

        return $router;

    }

    public function direct($url, $requestType){

        if(array_key_exists($url, $this->routes[$requestType])){
            
            return $this->callControllerMethod(...explode('@', $this->routes[$requestType][$url]));

        }
        
        throw new \Exception('Ne postoji url kojeg ste upisali');
    }
    
    protected function callControllerMethod($controller, $method){
        
        $controller = ("App\Controllers\\{$controller}");    
        $controller = new $controller;

        if(! method_exists($controller, $method)){

            throw new \Exception('Ne postoji url kojeg ste upisali');
        
        }
        return $controller->$method();
    }

}