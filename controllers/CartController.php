<?php

namespace Controllers;

use Models\CartItemModel;
use Views\CartView;

class CartController extends BaseController
{
  public function index($url)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };

    $userId = $_SESSION['user']['id'];
    $cartItemModel = new CartItemModel();
    $listCartItems = $cartItemModel->getByCondition(['userId' => $userId]);
    $view = new CartView();
    $view->render(['url' => $url, 'nav' => '/cart', 'listCartItems' => $listCartItems]);
  }

  public function addToCart($url)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };

    $userId = $_SESSION['user']['id'];
    $productId = $_POST['productId'];
    $cartItemModel = new CartItemModel();
    $cartItemInstances = $cartItemModel->getByCondition([
      'userId' => $userId,
      'productId' => $productId,
    ]);
    if (count($cartItemInstances)) {
      $cartItemInstance = $cartItemInstances[0];
      $cartItemModel->updateById($cartItemInstance['id'], [
        "quantity" => $cartItemInstance['quantity'] + 1
      ]);
    } else {
      $cartItemModel->insert([
        'userId' => $userId,
        'productId' => $productId,
      ]);
    }
  }

  public function setQuantity($url)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };

    $userId = $_SESSION['user']['id'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    if ($quantity > 10) {
      $quantity = 10;
    } else if ($quantity <= 0) {
      $quantity = 1;
    }

    $cartItemModel = new CartItemModel();
    $cartItemInstances = $cartItemModel->getByCondition([
      'userId' => $userId,
      'productId' => $productId,
    ]);
    if (count($cartItemInstances)) {
      $cartItemInstance = $cartItemInstances[0];
      $cartItemModel->updateById($cartItemInstance['id'], [
        "quantity" => $quantity
      ]);
    } else {
      $cartItemModel->insert([
        'userId' => $userId,
        'productId' => $productId,
        "quantity" => $quantity
      ]);
    }
  }
}
