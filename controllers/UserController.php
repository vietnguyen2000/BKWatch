<?php

namespace Controllers;

use Models\UserModel;
use Views\ErrorView;
use Views\UserView;

class UserController
{
  public function index($url)
  {
    $view = new UserView();
    $view->render(['url' => $url, 'nav' => '/blog']);
  }

  public function register($url)
  {
    $user = new UserModel();
    $conditions = [
      ["username" => $_POST["username"]],
      ["email" => $_POST["email"]]
    ];
    $existUser = $user->getByCondition(...$conditions);
    if (count($existUser)) {
      $errorView = new ErrorView();
      $errorView->render([
        'errorCode' => '406',
        'title' => "Tồn tại email hoặc tên đăng nhập",
        'text' => "Email hoặc tên đăng nhập của bạn đã tồn tại. Xin hãy thử lại!"
      ]);
      return;
    };

    $data = [
      'username' => $_POST['username'],
      'password' => password_hash($_POST['password'], null),
      'fullname' => $_POST['fullname'],
      'email' => $_POST['email'],
      'phoneNumber' => $_POST['phoneNumber'],
      'gender' => intval($_POST['gender']),
      'role' => 1,
    ];


    print_r($_POST);
    $user->insert($data);
  }
}
