<?php

// Định nghĩa hằng Path của file index.php
define('PATH_ROOT', __DIR__);

// This hack help files importable on MacOS
function include_class($class) {
  $path = PATH_ROOT . DIRECTORY_SEPARATOR;
  $path .= str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
  $path = realpath($path);
  if (file_exists($path)) {    
    require $path;
    return true;
  }
}

// Autoload class trong PHP
spl_autoload_register(function (string $class_name) {
  //include_once PATH_ROOT . '/' . lcfirst($class_name) . '.php';
  include_class($class_name);
});

require 'configs/index.php';
require "databases/connection.php";

session_start();
ob_start();

require 'utils/validate.php';
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

  <script src="/assets/js/bootstrap-show-notification.js"></script>
  <!-- MDB -->

  <link rel="stylesheet" href="/assets/css/mdb.custom.css">
  <link rel="stylesheet" href="/styles.css">

  <title>BK Watch</title>
</head>

<body>
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

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

  <?php if (isset($_SESSION['user']) && !$_SESSION['isRemembered']) { ?>
    <script>
      setTimeout(() => {
        alert('Your session is out of time! Please login again!')
        $.get('session-destroy')
        location.reload()
      }, <?= $session_time * 1000 ?>)
    </script>
  <?php } ?>

  <script>
    function addToCart(productId, productTitle) {
      <?php if (!isset($_SESSION['user'])) { ?>
        window.location.href = "<?= ROOT_URL . '/login' ?>"
        return
      <?php } else { ?>
        $.post('/cart/add', {
          productId
        })
        $.showNotification({
          type: "primary",
          body: "Bạn đã thêm \"" + productTitle + "\" vào giỏ hàng thành công",
          duration: 3000,
          direction: 'append'
        })
        $('.cart-badge').each((index, e) => {
          e.innerHTML = parseInt(e.innerHTML) + 1
        })
      <?php } ?>
    }
    function addToFavorite(productId) {
      $.post('/favorite/add', {
          "productId": productId,
        })
        $.showNotification({
          type: "primary",
          body: "Bạn đã thêm vào mục yêu thích thành công",
          duration: 3000,
          direction: 'append'
        })
        $('.cart-badge').each((index, e) => {
          e.innerHTML = parseInt(e.innerHTML) + 1
        })
    }
  </script>
</body>

</html>