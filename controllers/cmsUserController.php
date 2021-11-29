<?php

namespace Controllers;

use Models\BlogModel;
use Models\OrdersModel;
use Models\ProductModel;
use Models\UserModel;

use Views\ErrorView;
use Views\UserView;
use Views\cmsUserView;

class cmsUserController extends BaseController
{
  public function index($url)
  {
    if (!isset($_SESSION['user']) ) {
      $this->redirect('/login');
      return;
    };
    if ($_SESSION['user']['role'] != 1 ) {
      $this->redirect('/');
      return;
    };
    $view = new cmsUserView();
    $dataUser = new UserModel();
    $data = $dataUser->getAll();
    $userId = $_SESSION['user']['id'];
    $userImg = $_SESSION['user']['avatarURL'];
    $username = $_SESSION['user']['username'];
    $view->render(['url' => $url, 'nav' => 'cmsUser', 'userId' => $userId, 'userImg' => $userImg, 'username'=>$username, 'data'=>$data]);
  }
  public function update($url){
    $id = $_POST['ID'];
    $role = $_POST['role'];
    $dataUser = new UserModel();
    $dataUser->updateById(
      $id, [
        "role" => $role
      ]
      );
  }
  public function delete($url){
    $id = $_POST['ID'];
    $dataUser = new UserModel();
    $dataUser->delete($id);
  }
}