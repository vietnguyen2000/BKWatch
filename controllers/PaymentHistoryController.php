<?php

namespace Controllers;

use Models\OrdersModel;
use Views\PaymentHistoryView;

class PaymentHistoryController extends BaseController
{
  public function index($url)
  {
    $ordersModel = new OrdersModel();
    $listOrder = $ordersModel->getByCondition(["userId" => $_SESSION['userId']]);

    $paymentHistoryView = new PaymentHistoryView();
    $paymentHistoryView->render();
  }
}
