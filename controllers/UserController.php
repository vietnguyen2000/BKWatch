<?php

namespace Controllers;

use Models\UserModel;
use Views\ErrorView;
use Views\UserView;

class UserController extends BaseController
{
  public function index($url)
  {
    $view = new UserView();
    $view->render(['url' => $url]);
  }

  // get
  public function profile($url)
  {
    print_r($_SESSION);
  }

  // post
  public function register($url)
  {
    $user = new UserModel();
    $conditions = [
      ["username" => $_POST["username"]],
      ["email" => $_POST["email"]]
    ];
    $existUser = $user->getByCondition(...$conditions);
    if (count($existUser)) {
      $this->showError(
        '406',
        "Tồn tại email hoặc tên đăng nhập",
        "Email hoặc tên đăng nhập của bạn đã tồn tại. Xin hãy thử lại!"
      );
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

    $this->redirect('/', true);
  }

  // post
  public function login($url)
  {
    $userModel = new UserModel();
    $existUser = $userModel->getByCondition(["username" => $_POST['username']]);
    if (count($existUser) == 0) {
      $this->showError(
        '406',
        "Tài khoản hoặc mật khẩu không chính xác",
        "Tài khoản hoặc mật khẩu của bạn nhập không chính xác. Xin hãy thử lại!"
      );
      return;
    }

    $user = $existUser[0];
    if (!password_verify($_POST['password'], $user['password'])) {
      $this->showError(
        '406',
        "Tài khoản hoặc mật khẩu không chính xác",
        "Tài khoản hoặc mật khẩu của bạn nhập không chính xác. Xin hãy thử lại!"
      );
      return;
    };

    print_r("Đăng nhập thành công! Xin chào " . $user['fullname']);
    $_SESSION['user'] = $user;
    unset($_SESSION['user']['password']);
    print_r($_POST);
    if ($_POST['rememberMe']) {
      $_SESSION['isRemembered'] = true;
      $rememberToken = $userModel->refreshRememberToken($user['username']);
      setcookie('userRememberToken', $rememberToken);
      setcookie('username', $user['username']);
    }

    // $this->redirect('/', true);
  }
}
