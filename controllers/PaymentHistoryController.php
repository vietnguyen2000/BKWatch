<?php

namespace Controllers;

use Models\OrderItemsModel;
use Models\OrdersModel;
use Views\PaymentHistoryView;

class PaymentHistoryController extends BaseController
{
  public function index($url)
  {
    $ordersModel = new OrdersModel();
    $listOrders = $ordersModel->getByCondition(["userId" => $_SESSION['user']['id']]);

    $paymentHistoryView = new PaymentHistoryView();
    $paymentHistoryView->render(["listOrders" => $listOrders]);
  }

  public function details($url)
  {
    $orderId = $_REQUEST['orderId'];
    $ordersModel = new OrdersModel();
    $listOrders = $ordersModel->getByCondition(["userId" => $_SESSION['user']['id'], "id" => $orderId]);
    if (count($listOrders) == 0) {
      $this->showError('404', 'Không tìm thấy order của bạn', 'Đường dẫn bạn tìm kiếm không chính xác!');
      return;
    }

    $order = $listOrders[0];
    $orderItemsModel = new OrderItemsModel();
    $listItems = $orderItemsModel->getByCondition(['orderId' => $orderId]);
    $order['listItems'] = $listItems;

    $paymentHistoryView = new PaymentHistoryView();
    $paymentHistoryView->renderDetails(["order" => $order]);
  }

  public function detailsPost($url)
  {
    $orderId = $_REQUEST['orderId'];
    $ordersModel = new OrdersModel();
    $listOrders = $ordersModel->getByCondition(["userId" => $_SESSION['user']['id'], "id" => $orderId]);
    if (count($listOrders) == 0) {
      $this->showError('404', 'Không tìm thấy order của bạn', 'Đường dẫn bạn tìm kiếm không chính xác!');
      return;
    }

    $order = $listOrders[0];
    $orderItemsModel = new OrderItemsModel();
    $listItems = $orderItemsModel->getByCondition(['orderId' => $orderId]);
    $order['listItems'] = $listItems;

    $paymentHistoryView = new PaymentHistoryView();
    $paymentHistoryView->processRenderDetailsBody(["order" => $order]);
  }
}
