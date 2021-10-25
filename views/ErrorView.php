<?php

namespace Views;

class ErrorView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    $defaultData = [
      'errorCode' => 404,
      'title' => "Có vẻ bạn đã lạc đường",
      'text' => "Trang bạn đang tìm kiếm không tồn tại!"
    ];

    $data = array_merge($defaultData, $data);

    require 'pages/error/error.php';
  }
}
