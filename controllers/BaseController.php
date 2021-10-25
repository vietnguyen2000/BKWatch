<?php

namespace Controllers;

use Views\ErrorView;

abstract class BaseController
{
  // any method with interface 
  // ($fullUrl, ${urlParam1}, ${urlParam2}, ...)

  public function redirect($url, $permanent = false)
  {
    header('Location:' . $url, true, $permanent ? 301 : 302);

    ob_end_flush();
  }

  public function showError(string $errorCode, string $title, string $text)
  {
    $errorView = new ErrorView();
    $errorView->render([
      'errorCode' => '406',
      'title' => "Tài khoản hoặc mật khẩu không chính xác",
      'text' => "Tài khoản hoặc mật khẩu của bạn nhập không chính xác. Xin hãy thử lại!"
    ]);
  }
}
