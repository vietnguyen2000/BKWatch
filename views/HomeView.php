<?php

namespace Views;

class HomeView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    require 'pages/home/home.php';
  }
}
