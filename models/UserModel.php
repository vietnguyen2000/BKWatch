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
  public function getFullnameById(int $id)
  {
    try {
      $sql = "SELECT fullname FROM user WHERE id = " . $id;
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data[0]['fullname'];
    } catch (\Exception $e) {
      return [];
    }
  }
}
