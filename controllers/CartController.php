<?php

namespace Controllers;

use Views\CartView;

class CartController extends BaseController
{
  public function index($url)
  {
    $view = new CartView();
    $view->render(['url' => $url, 'nav' => '/cart']);
  }
}
