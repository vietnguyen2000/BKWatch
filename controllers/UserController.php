<?php

namespace Controllers;

use Views\UserView;

class UserController
{
  public function index($url)
  {
    $view = new UserView();
    $view->render(['url' => $url, 'nav' => '/blog']);
  }
}
