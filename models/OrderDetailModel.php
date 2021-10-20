<?php
require_once 'models/BaseModel.php';
class OrderDetailModel extends BaseModel
{
  public function __construct(\mysqli $db)
  {
    parent::__construct($db);
    $this->name = 'orderDetail';
  }
}
