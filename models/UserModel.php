<?php

namespace Models;

use Utils\Utils;

class UserModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'user';
  }

  public function refreshRememberToken(string $username): string
  {
    $randomString = Utils::randomString(64);
    $this->update(['rememberToken' => $randomString], ["username" => $username]);
    return $randomString;
  }
}
