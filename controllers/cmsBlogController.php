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
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
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
        $view = new BlogView();
        $this->dataHeader = $this->blogModel->getBlogById($id);
        $data = $this->blogModel->getBlogById($id);
        $view->renderDetails([
            'url' => $url,
            'nav' => '/blog',
            'header' => $this->dataHeader,
            'data' => $data,
            'id' => $id
        ]);
        $getData = $this->blogModel->getByCondition([
            "id" => $id
        ]);
        $countView = (int)$getData[0]["countView"];
        $this->blogModel->updateById(
            $id,
            [
                "countView" => $countView + 1
            ]
        );
    }
  public function add($url)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };
    $view = new cmsAddBlogView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBlog', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username]);
  }
}