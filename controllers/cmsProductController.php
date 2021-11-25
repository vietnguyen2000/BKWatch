<?php

namespace Controllers;

use Models\BlogModel;
use Models\ProductCommentModel;
use Models\ProductModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsProductView;
use Views\cmsAddProductView;

class cmsProductController extends BaseController
{
  var $ItemPerPage;
  var $productModel;
  public function __construct()
  {
      $this->productModel = new ProductModel();
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
    $data = $this->productModel->getAll();
    $view = new cmsProductView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsProduct', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data' => $data]);
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
    $view = new cmsAddProductView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsAddProduct', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username]);
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
        $view = new cmsAddProductView();
        $data = $this->blogModel->getBlogById($id);
        $view->renderDetails([
            'url' => $url,
            'nav' => '/cmsAddProduct',
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
}