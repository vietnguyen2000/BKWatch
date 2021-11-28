<?php

namespace Models;

class ContactModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'blog';
  }
  public function getContact()
  {
    try {
      $sql = "SELECT * FROM bkwatch.contact";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
