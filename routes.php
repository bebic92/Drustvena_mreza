<?php


$router->get('', 'PagesController@home');
$router->get('login', 'AuthController@showLogin');
$router->get('register', 'AuthController@showRegister');
$router->post('register', 'AuthController@store');
$router->post('login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');

$router->post('newPost', 'PostsController@store');
$router->post('comment', 'CommentsController@store');






$router->post('getComments', 'PagesController@getComments');
$router->get('ajaxShowComments', 'AjaxController@showComments');