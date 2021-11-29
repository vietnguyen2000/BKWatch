<?php

namespace Controllers;

use Models\BlogModel;
use Models\OrderItemsModel;
use Models\OrdersModel;
use Models\ProductModel;
use Models\UserModel;
use Views\cmsOrderDetailsView;
use Views\ErrorView;
use Views\UserView;
use Views\cmsOrderView;

class cmsOrderController extends BaseController
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
    $view = new cmsOrderView();
    $dataOrder = new OrdersModel();
    $data = $dataOrder->getAllOrder();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsOrder', 'userId' => $userId, 'userImg' => $userImg, 'username' => $username, 'data' => $data]);
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
    $statusOrder = $_POST['status'];
    $dataOrder = new OrdersModel();
    $dataOrder->updateById(
      $id,
      [
        "status" => $statusOrder
      ]
    );
  }

  public function details($url, $orderId)
  {
    if (!isset($_SESSION['user'])) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1) {
      $this->redirect('/');
      return;
    };
    $ordersModel = new OrdersModel();
    $listOrders = $ordersModel->getByCondition(["id" => $orderId]);


    $order = $listOrders[0];
    $orderItemsModel = new OrderItemsModel();
    $listItems = $orderItemsModel->getByCondition(['orderId' => $orderId]);
    $order['listItems'] = $listItems;

    $view = new cmsOrderDetailsView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsOrder', 'userId' => $userId, 'userImg' => $userImg, 'username' => $username, 'data' => $order]);
  }
}
