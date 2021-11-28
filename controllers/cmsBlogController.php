<?php

namespace Controllers;

use Models\BlogModel;
use Models\ProductCommentModel;
use Models\ProductModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsBlogView;
use Views\cmsAddBlogView;

class cmsBlogController extends BaseController
{
  var $ItemPerPage;
  var $blogModel;
  public function __construct()
  {
      $this->blogModel = new BlogModel();
      $this->ItemPerPage = 10;
      $this->data = [];
  }
  public function index($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] > 0 ) {
      $this->redirect('/');
      return;
    };
    $data = $this->blogModel->getAll();
    $view = new cmsBlogView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBlog', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
  }
  public function update($url, $id)
    {
      if (!isset($_SESSION['user']) ) {
        $this->redirect('/login');
        return;
      };
      if ($_SESSION['user']['role'] > 0 ) {
        $this->redirect('/');
        return;
      };
        $view = new cmsAddBlogView();
        $data = $this->blogModel->getBlogById($id);
        $comment = $this->blogModel->getCmtsByBlogId($id);
        $userId = $_SESSION['user']['id'];
        $userImg = $_SESSION['user']['avatarURL'];
        $username = $_SESSION['user']['username'];
        $imageList = $this->blogModel->getImageHelpById($id);
        $view->render([
            'url' => $url,
            'nav' => 'cmsBlog',
            'comment' => $comment,
            'data' => $data,
            'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'add'=>false,
            'imageList'=> $imageList
        ]);
    }
  public function add($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] > 0 ) {
      $this->redirect('/');
      return;
    };
    $view = new cmsAddBlogView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBlog', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'comment' => array(), 'data' => '', 'add'=>true]);
  }
}