<?php

namespace Controllers;

use Models\ProductBrandModel;
use Views\cmsBrandView;

class cmsBrandController extends BaseController
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
    $view = new cmsBrandView();
    $productBrandModel = new ProductBrandModel();
    $data = $productBrandModel->getAll();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsBrand', 'userId' => $userId, 'userImg' => $userImg, 'username' => $username, 'data' => $data]);
  }

  public function add($url)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1) {
      $this->redirect('/');
      return;
    };
    $title = $_POST['title'];
    $productBrandModel = new ProductBrandModel();
    $productBrandModel->insert(
      [
        "title" => $title
      ]
    );
  }

  public function update($url, $id)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1) {
      $this->redirect('/');
      return;
    };
    $title = $_POST['title'];
    $productBrandModel = new ProductBrandModel();
    $productBrandModel->updateById(
      $id,
      [
        "title" => $title
      ]
    );
  }

  public function delete($url, $id)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1) {
      $this->redirect('/');
      return;
    };
    $productBrandModel = new ProductBrandModel();
    $productBrandModel->delete(
      $id,
    );
  }
}
