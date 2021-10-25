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
    $view->render(['url' => $url]);
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
    $user->insert($data);
    print_r("Đăng ký thành công! Xin chào " . $_POST['fullname']);
  }

  public function login($url)
  {
    $userModel = new UserModel();
    $existUser = $userModel->getByCondition(["username" => $_POST['username']]);
    if (count($existUser) == 0) {
      $errorView = new ErrorView();
      $errorView->render([
        'errorCode' => '406',
        'title' => "Tài khoản hoặc mật khẩu không chính xác",
        'text' => "Tài khoản hoặc mật khẩu của bạn nhập không chính xác. Xin hãy thử lại!"
      ]);
      return;
    }

    $user = $existUser[0];
    if (!password_verify($_POST['password'], $user['password'])) {
      $errorView = new ErrorView();
      $errorView->render([
        'errorCode' => '406',
        'title' => "Tài khoản hoặc mật khẩu không chính xác",
        'text' => "Tài khoản hoặc mật khẩu của bạn nhập không chính xác. Xin hãy thử lại!"
      ]);
      return;
    };

    print_r("Đăng nhập thành công! Xin chào " . $user['fullname']);
  }
}
