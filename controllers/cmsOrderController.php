<?php

namespace Controllers;

use Models\BlogModel;
use Models\OrdersModel;
use Models\ProductModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsOrderView;

class cmsOrderController extends BaseController
{
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
    $view = new cmsOrderView();
    $dataOrder = new OrdersModel();
    $data = $dataOrder->getAllOrder();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsOrder', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data'=>$data]);
  }
  public function update($url){
    $id = $_POST['ID'];
    $statusOrder = $_POST['statusOrder'];
    $dataOrder = new OrdersModel();
    $dataOrder->updateById(
      $id, [
        "status" => $statusOrder
      ]
      );
  }
}