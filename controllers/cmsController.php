<?php

namespace Controllers;

use Models\BlogModel;
use Models\OrderItemsModel;
use Models\OrdersModel;
use Models\ProductCommentModel;
use Models\ProductModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsAdminView;

class cmsController extends BaseController
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
    $view = new cmsAdminView();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];

    $totalUsers = (new UserModel())->getTotalUser();
    $totalOrders = (new OrdersModel())->getTotalOrder();
    $totalProductSales = (new OrderItemsModel())->getTotalProductSales();
    $view->render(['url' => $url, 'nav' => 'cms', 'userId' => $userId, 'userImg' => $userImg, 'username' => $username, 'totalUsers' => $totalUsers, 'totalOrders' => $totalOrders, 'totalProductSales' => $totalProductSales]);
  }
}
