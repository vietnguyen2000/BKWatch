<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <style>
    <?php include 'styles.css' ?>
  </style>
  <title>BK Watch</title>
</head>

<body>
  <?php require 'configs/index.php' ?>
  <?php

  // Định nghĩa hằng Path của file index.php
  define('PATH_ROOT', __DIR__);

  // Autoload class trong PHP
  spl_autoload_register(function (string $class_name) {
    include_once PATH_ROOT . '/' . lcfirst($class_name) . '.php';
  });

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
</body>

</html>