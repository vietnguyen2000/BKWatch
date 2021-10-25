<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- MDB -->
  <style>
    <?php
    include './assets/css/mdb.custom.css';
    include 'styles.css'
    ?>
  </style>

  <title>BK Watch</title>
</head>

<body>
  <?php
  require 'configs/index.php';
  require "databases/connection.php";
  ?>
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

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
</body>

</html>