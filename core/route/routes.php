<?php

//testing 
$router->get('/Home/X/{id}', 'HomeController@homepage');

$router->get('/', 'HomeController@index');
$router->get('/intro', 'IntroController@index');
$router->get('/watch', 'WatchController@index');
$router->get('/blog', 'BlogController@index');
$router->get('/contact', 'ContactController@index');
$router->get('/me', 'UserController@index');
