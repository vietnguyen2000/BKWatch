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
$router->post('/blog/{id}/comment', 'BlogController@addComment');
$router->get('/blog/{id}/like', 'BlogController@addLike');
$router->get('/contact', 'ContactController@index');
$router->get('/me', 'UserController@profile');
$router->get('/login', 'UserController@index');
$router->get('/logout', 'UserController@logout');
$router->get('/watch/{id}', 'WatchController@detail');
$router->get('/cart', 'CartController@index');
$router->post('/watch/{id}/comment', 'WatchController@addComment');

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
$router->post('/cart/add', 'CartController@addToCart');
$router->post('/cart/set', 'CartController@setQuantity');
$router->post('/cart/delete', 'CartController@delete');
