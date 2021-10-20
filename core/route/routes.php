<?php

$router->get('/', 'HomeController@index');
$router->get('/Home/{id}', 'HomeController@homepage');
