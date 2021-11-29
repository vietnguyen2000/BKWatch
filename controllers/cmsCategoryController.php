<?php

namespace Controllers;

use Models\ProductCategoryModel;
use Views\cmsCategoryView;

class cmsCategoryController extends BaseController
{
  public function index($url)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1) {
      $this->redirect('/');
      return;
    };
    $view = new cmsCategoryView();
    $productCategoryModel = new ProductCategoryModel();
    $data = $productCategoryModel->getAll();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsCategory', 'userId' => $userId, 'userImg' => $userImg, 'username' => $username, 'data' => $data]);
  }

  public function add($url)
  {
    $title = $_POST['title'];
    $productCategoryModel = new ProductCategoryModel();
    $productCategoryModel->insert(
      [
        "title" => $title,
        "level" => 1
      ]
    );
    print_r($title);
  }

  public function update($url, $id)
  {
    $title = $_POST['title'];
    $productCategoryModel = new ProductCategoryModel();
    $productCategoryModel->updateById(
      $id,
      [
        "title" => $title
      ]
    );
  }

  public function delete($url, $id)
  {
    $productCategoryModel = new ProductCategoryModel();
    $productCategoryModel->delete(
      $id,
    );
  }
}
