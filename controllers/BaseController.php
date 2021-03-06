<?php

namespace Controllers;

use Views\ErrorView;

abstract class BaseController
{
  // any method with interface 
  // ($fullUrl, ${urlParam1}, ${urlParam2}, ...)

  public function redirect($url, $permanent = false)
  {
    $correctUrl = $url;
    if (!str_contains($url, '?')) {
      $correctUrl = $url . '?' . http_build_query($_GET);
    }

    header('Location:' . $correctUrl, true, $permanent ? 301 : 302);

    ob_end_flush();
  }

  public function showError(string $errorCode, string $title, string $text)
  {
    $errorView = new ErrorView();
    $errorView->render([
      'errorCode' => $errorCode,
      'title' => $title,
      'text' => $text
    ]);
  }
}
