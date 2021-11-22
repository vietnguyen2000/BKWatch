<?php

namespace Controllers;

use Models\BlogModel;
use Models\ProductCommentModel;
use Models\ProductModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsAdminView;

class cmsController extends BaseController
{
  public function index($url)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };
    $view = new cmsAdminView();
    $userId = $_SESSION['user']['id'];
    $view->render(['url' => $url, 'nav' => 'index', 'userId' => $userId]);
  }
}