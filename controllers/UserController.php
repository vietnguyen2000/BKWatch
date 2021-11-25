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
    $userView = new UserView();
    $userView->renderProfile([
      'url' => $url, 
      'user' => $_SESSION['user'],
    ]);
  }

  // get
  public function logout($url)
  {
    unset($_SESSION['user']);
    setcookie('username', "", path: "/");
    setcookie('userRememberToken', "", path: "/");
    $this->redirect("/");
  }

  // get
  public function edit($url) 
  {
    $userView = new UserView();
    $userView->renderUpdateProfile([
      'url' => $url, 
      'user' => $_SESSION['user'],
    ]);
  }
  //get
  public function changepw($url) 
  {
    $userView = new UserView();
    $userView->renderChangepw([
      'url' => $url,
    ]);
  }
  public function changepwPost($url) 
  {
    // xu li logic
    // hash oldpass nguoi dung nhap vao
    // query password cua nguoi do dang luu trong database
    // So sanh 2 cai do voi nhau
    // Neu dung, viet sql update hash password moi, roi chuyen huong
    // New sai thi chay 2 dong code duoi

    // $oldpass = $_POST["old_pass"];
    // $hash_oldPass = 
    // $password = ....;
    // if($password == $hash_oldPass)){
    //   // update mk
    // }
    // else{
    //   $userView = new UserView();
    //   $userView->renderChangepw(['url' => $url, 'alert' => ['title' => 'Lỗi!', 'text' => 'Email hoặc tên đăng nhập của bạn đã tồn tại. Xin hãy thử lại!', 'type' => 'danger']]);
    // }
    
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
      $userView = new UserView();
      $userView->render(['url' => $url, 'alert' => ['title' => 'Lỗi!', 'text' => 'Email hoặc tên đăng nhập của bạn đã tồn tại. Xin hãy thử lại!', 'type' => 'danger']]);
      return;
    };
    // Create Avatar id & file
    $defaultImage = 'uploads/default.png';
    $userImage = 'uploads/' . uniqid() . '.png';
    copy($defaultImage, $userImage) or die("Unable to copy $defaultImage to $userImage.");
    $data = [
      'username' => $_POST['username'],
      'password' => password_hash($_POST['password'], null),
      'fullname' => $_POST['fullname'],
      'email' => $_POST['email'],
      'phoneNumber' => $_POST['phoneNumber'],
      'gender' => intval($_POST['gender']),
      'role' => 0,
      'avatarURL' => $userImage,
    ];
    $user->insert($data);
    print_r("Đăng ký thành công! Xin chào " . $_POST['fullname']);

    $this->redirect('/', true);
  }

  // post
  public function login($url)
  {
    $userView = new UserView();
    $userModel = new UserModel();
    $existUser = $userModel->getByCondition(["username" => $_POST['username']]);
    if (count($existUser) == 0) {
      $userView->render(['url' => $url, 'alert' => ['title' => 'Lỗi!', 'text' => 'Tài khoản hoặc mật khẩu không chính xác', 'type' => 'danger']]);
      return;
    }

    $user = $existUser[0];
    if (!password_verify($_POST['password'], $user['password'])) {
      $userView->render(['url' => $url, 'alert' => ['title' => 'Lỗi!', 'text' => 'Tài khoản hoặc mật khẩu không chính xác', 'type' => 'danger']]);
      return;
    };

    print_r("Đăng nhập thành công! Xin chào " . $user['fullname']);
    $_SESSION['user'] = $user;
    unset($_SESSION['user']['password']);
    print_r($_POST);
    if ($_POST['rememberMe']) {
      $_SESSION['isRemembered'] = true;
      $rememberToken = $userModel->refreshRememberToken($user['username']);
      setcookie('userRememberToken', $rememberToken, path: "/");
      setcookie('username', $user['username'], path: "/");
    }

    $this->redirect('/', true);
  }

  public function update($url, $id)
  {
    $userView = new UserView();

    // Only support self-update profile
    if ($id != $_SESSION['user']['id']) {
      // Permission Deny
      $userView->render(['url' => $url, 'alert' => ['title' => 'Lỗi!', 'text' => 'Không có quyền', 'type' => 'danger']]);
    }
    
    $userModel = new UserModel();
    $existUser = $userModel->getByCondition(["id" => $id]);
    if (count($existUser) == 0) {
      $userView->render(['url' => $url, 'alert' => ['title' => 'Lỗi!', 'text' => 'Tài khoản không tồn tại', 'type' => 'danger']]);
      return;
    }
    $currentUser = $existUser[0];

    $user = new UserModel();
    $user->updateById(
      $id, 
      [
        'fullname' => isset($_POST['fullname'])? $_POST['fullname'] : $currentUser["fullname"],
        'email' => isset($_POST['email'])? $_POST['email'] : $currentUser["email"],
        'phoneNumber' => isset($_POST['phoneNumber'])? $_POST['phoneNumber'] : $currentUser["phoneNumber"],
        'gender' => isset($_POST['gender'])? intval($_POST['gender']) : $currentUser["gender"],
        'address' => isset($_POST['address'])? $_POST['address'] : $currentUser["address"],
        'avatarURL' => isset($_POST["avatarURL"])? $_POST['avatarURL']: $currentUser["avatarURL"],
        // sensitive data
        // 'username' => $_POST['username'], // should not change username
        'password' => isset($_POST["password"])? password_hash($_POST['password'], null) : $currentUser["password"],
        'role' => isset($_POST['role'])? intval($_POST['role']) : $currentUser["role"],
      ]
    );
    $this->redirect('/me', true);
  }
}
