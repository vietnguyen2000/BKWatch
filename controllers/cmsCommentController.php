<?php

namespace Controllers;

use Models\ProductCommentModel;
use Models\BlogCommentModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsBlogCommentView;
use Views\cmsProductCommentView;

class cmsCommentController extends BaseController
{
  public function blog($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] > 0 ) {
      $this->redirect('/');
      return;
    };
    $dataBlog = new BlogCommentModel();
    $data = $dataBlog->getAllComment();
    $view = new cmsBlogCommentView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBlogComment', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
  }
  public function product($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] > 0 ) {
      $this->redirect('/');
      return;
    };
    $dataProduct = new ProductCommentModel();
    $data = $dataProduct->getAllComment();
    $view = new cmsProductCommentView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsProductComment', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
  }
}