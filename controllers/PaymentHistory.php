<?php

namespace Controllers;

use Models\OrdersModel;

class PaymentController extends BaseController
{
  public function index($url)
  {
    $ordersModel = new OrdersModel();
    $listOrder = $ordersModel->getByCondition(["userId" => $_SESSION['userId']]);
  }
}
