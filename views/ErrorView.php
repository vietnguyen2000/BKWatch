<?php

namespace Views;

class ErrorView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    $defaultData = [
      'errorCode' => 404,
      'title' => "Look like you're lost",
      'text' => "The page you are looking for not avaible!"
    ];

    $data = array_merge($data, $defaultData);

    require 'pages/error/error.php';
  }
}
