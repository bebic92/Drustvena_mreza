<?php


function view($view, $data = []){
    
    extract($data);
    
    return require("public/views/{$view}.view.php");

}

function redirect($route){

    return header("Location: {$route}");

}