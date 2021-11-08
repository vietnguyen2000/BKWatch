<?php

namespace Controllers;

use Models\CartItemModel;
use Views\CartView;

class CartController extends BaseController
{
  public function index($url)
  {
    $view = new CartView();
    $view->render(['url' => $url, 'nav' => '/cart']);
  }

  public function addToCart($url)
  {
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
}
