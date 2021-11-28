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
    $categoryList = $this->productModel->getAllCategory();
    $brandList = $this->productModel->getAllBrand();
    $imageList = array();
    $view = new cmsAddProductView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsAddProduct', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'add'=>true, 'data' =>'', 'categoryList' => $categoryList, 'brandList' => $brandList]);
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
      $categoryList = $this->productModel->getAllCategoryHelp();
      $brandList = $this->productModel->getAllBrandHelp();
      $imageList = $this->productModel->getImageHelpById($id);
      $view = new cmsAddProductView();
      $data = $this->productModel->getById($id);
      $userId = $_SESSION['user']['id'];
      $userImg = $_SESSION['user']['avatarURL'];
      $username = $_SESSION['user']['username'];
      $view->render(['url' => $url, 'nav' => 'cmsAddProduct', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'add'=>false, 'data' =>$data, 'categoryList' => $categoryList, 'brandList' => $brandList, 'imageList'=> $imageList]);
    }
}