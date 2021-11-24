<?php

// Định nghĩa hằng Path của file index.php
define('PATH_ROOT', __DIR__);

// Autoload class trong PHP
spl_autoload_register(function (string $class_name) {
  include_once PATH_ROOT . '/' . lcfirst($class_name) . '.php';
});

require 'configs/index.php';
require "databases/connection.php";

session_start();
ob_start();

require 'utils/validate.php';
?>

  <?php

  // load class Route
  $router = new Core\Http\Route();
  include_once PATH_ROOT . '/core/route/routes.php';

  // Lấy url hiện tại của trang web. Mặc định la /
  $request_url = !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

  // Lấy phương thức hiện tại của url đang được gọi. (GET | POST). Mặc định là GET.
  $method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

  // map URL
  $router->map($request_url, $method_url);
  ?>

  