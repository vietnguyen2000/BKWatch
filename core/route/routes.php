<?php

// run seeder
$router->get('/seed', 'SeedController@index');

//testing 
$router->get('/Home/X/{id}', 'HomeController@homepage');

$router->get('/session-destroy', fn () => session_destroy());
$router->get('/', 'HomeController@index');
$router->get('/intro', 'IntroController@index');
$router->get('/watch', 'WatchController@index');
$router->get('/blog', 'BlogController@index');
$router->get('/blog/{id}', 'BlogController@detail');
$router->get('/contact', 'ContactController@index');
$router->get('/me', 'UserController@profile');
$router->get('/login', 'UserController@index');
$router->get('/logout', 'UserController@logout');
$router->get('/watch/{id}', 'WatchController@detail');
$router->post('/watch/{id}/comment', 'WatchController@addComment');

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
