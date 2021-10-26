<?php

//testing 
$router->get('/Home/X/{id}', 'HomeController@homepage');

$router->get('/', 'HomeController@index');
$router->get('/intro', 'IntroController@index');
$router->get('/watch', 'WatchController@index');
$router->get('/blog', 'BlogController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/me', 'UserController@profile');
$router->get('/login', 'UserController@index');
$router->get('/session-destroy', fn () => session_destroy());
$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
