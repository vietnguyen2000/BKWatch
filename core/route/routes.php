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

$router->get('/cms/blog', 'cmsBlogController@index');
$router->get('/cms/blog/add/', 'cmsBlogController@add');
$router->get('/cms/blog/update/{id}', 'cmsBlogController@update');
$router->post('/cms/blog/deleteCmt', 'cmsBlogController@deleteCmt');
$router->post('/cms/blog/add', 'cmsBlogController@addBlog');
$router->post('/cms/blog/update/{id}', 'cmsBlogController@updateBlog');

$router->post('/cms/blog/delete', 'cmsBlogController@delete');
$router->get('/cmsProduct', 'cmsProductController@index');
$router->post('/cmsProduct/delete', 'cmsProductController@delete');
$router->get('/cmsProduct/add', 'cmsProductController@add');
$router->post('/cmsProduct/add', 'cmsProductController@addProduct');
$router->post('/cmsProduct/update/{id}', 'cmsProductController@updateProduct');
$router->get('/cmsProduct/{id}', 'cmsProductController@update');
$router->get('/cmsOrder', 'cmsOrderController@index');
$router->post('/cmsOrder/update', 'cmsOrderController@update');
$router->get('/cmsProductComment', 'cmsCommentController@product');
$router->get('/cmsBlogComment', 'cmsCommentController@blog');

$router->get('/cmsBlogImage', 'cmsImageController@blog');
$router->get('/cmsProductImage', 'cmsImageController@product');
$router->post('/payment/VNPay/payment', 'VNPayController@payment');
$router->get('/payment/VNPay/payment/{id}', 'VNPayController@VNPaymentOrderId');
$router->get('/payment/VNPay/ipn', 'VNPayController@VNPayIPN');
$router->get('/payment/VNPay/result', 'VNPayController@VNPayReturn');

$router->get('/payment/history', 'PaymentHistoryController@index');
$router->get('/payment/orderDetails', 'PaymentHistoryController@details');
$router->post('/payment/orderDetails', 'PaymentHistoryController@detailsPost');

$router->get('/me/password', 'UserController@changepw');
$router->post('/me/password', 'UserController@changepwPost');
