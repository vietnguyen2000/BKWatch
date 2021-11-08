<?php

namespace Views;

class CartView extends BaseView
{
  protected function processRenderBody(array $data = [])
  {
    require 'pages/cart/index.php';
  }
}
