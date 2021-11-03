<?php

use Models\UserModel;

if (!isset($_SESSION['lastTimeStartSession'])) {
  $_SESSION['lastTimeStartSession'] = time();
}

if (time() - $_SESSION['lastTimeStartSession'] > $session_time) {
  session_destroy();
  $_SESSION = [];
}

if (isset($_COOKIE['username']) && isset($_COOKIE['userRememberToken'])) {
  $userModel = new UserModel();
  $existUser = $userModel->getByCondition(["username" => $_COOKIE['username'], "rememberToken" => $_COOKIE['userRememberToken']]);
  if (count($existUser) == 0) {
    if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
    }
    return;
  }

  $user = $existUser[0];
  $_SESSION['user'] = $user;
  unset($_SESSION['user']['password']);
  $_SESSION['isRemembered'] = true;
  $rememberToken = $userModel->refreshRememberToken($user['username']);
  setcookie('userRememberToken', $rememberToken, path: "/");
  setcookie('username', $user['username'],  path: "/");
}
