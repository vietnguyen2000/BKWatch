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
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] > 0 ) {
      $this->redirect('/login');
      return;
    };
    $view = new cmsAdminView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cms', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username]);
  }
}