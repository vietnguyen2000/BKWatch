<?php

namespace Controllers;

use Models\ProductImageModel;
use Models\BlogImageModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsImageView;

class cmsImageController extends BaseController
{
  public function blog($url)
  {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] > 0 ) {
      $this->redirect('/login');
      return;
    };
    $dataBlog = new BlogImageModel();
    $data = $dataBlog->getAll();
    $view = new cmsImageView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBlogImage', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
  }
  public function product($url)
  {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] > 0 ) {
      $this->redirect('/login');
      return;
    };
    $dataProduct = new ProductImageModel();
    $data = $dataProduct->getAll();
    $view = new cmsImageView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsProductImage', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
  }
}