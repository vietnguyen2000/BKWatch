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
$router->get('/me/edit', 'UserController@edit');
$router->get('/login', 'UserController@index');
$router->get('/logout', 'UserController@logout');
$router->get('/watch/{id}', 'WatchController@detail');
$router->get('/cart', 'CartController@index');
$router->post('/watch/{id}/comment', 'WatchController@addComment');
$router->get('/favorite', 'FavoriteController@index');

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
$router->post('/user/{id}/update', 'UserController@update');
$router->post('/cart/add', 'CartController@addToCart');
$router->post('/cart/set', 'CartController@setQuantity');
$router->post('/cart/delete', 'CartController@delete');
$router->post('/favorite/add', 'FavoriteController@add');
$router->post('/image/upload', 'ImageController@upload');


$router->get('/cms', 'cmsController@index');
$router->get('/cmsBlog', 'cmsBlogController@index');
$router->get('/cmsBlog/add/', 'cmsBlogController@add');
$router->get('/cmsBlog/update/{id}', 'cmsBlogController@update');
$router->get('/cmsProduct', 'cmsProductController@index');
$router->post('/cmsProduct/delete', 'cmsProductController@delete');
$router->get('/cmsAddProduct', 'cmsProductController@add');
$router->post('/cmsAddProduct/add', 'cmsProductController@addProduct');
$router->post('/cmsAddProduct/update/{id}', 'cmsProductController@updateProduct');
$router->get('/cmsUpdateProduct/{id}', 'cmsProductController@update');
$router->get('/cmsOrder', 'cmsOrderController@index');
$router->post('/cmsOrder/update', 'cmsOrderController@update');
$router->get('/cmsProductComment', 'cmsCommentController@product');
$router->get('/cmsBlogComment', 'cmsCommentController@blog');
$router->post('/cmsAddBlog/deleteCmt', 'cmsBlogController@deleteCmt');
$router->post('/cmsAddBlog/add', 'cmsBlogController@addBlog');
$router->post('/cmsAddBlog/update/{id}', 'cmsBlogController@updateBlog');
$router->get('/cmsBlogImage', 'cmsImageController@blog');
$router->get('/cmsProductImage', 'cmsImageController@product');
$router->get('/cmsUser', 'cmsUserController@index');
$router->post('/cmsUser/update', 'cmsUserController@update');
$router->post('/cmsUser/delete', 'cmsUserController@delete');
$router->post('/payment/VNPay/payment', 'VNPayController@payment');
$router->get('/payment/VNPay/payment/{id}', 'VNPayController@VNPaymentOrderId');
$router->get('/payment/VNPay/ipn', 'VNPayController@VNPayIPN');
$router->get('/payment/VNPay/result', 'VNPayController@VNPayReturn');

$router->get('/payment/history', 'PaymentHistoryController@index');
$router->get('/payment/orderDetails', 'PaymentHistoryController@details');
$router->post('/payment/orderDetails', 'PaymentHistoryController@detailsPost');

$router->get('/me/password', 'UserController@changepw');
$router->post('/me/password', 'UserController@changepwPost');
