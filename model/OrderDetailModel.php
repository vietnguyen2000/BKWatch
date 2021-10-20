<?php

namespace Model;

class OrderDetailModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'orderDetail';
  }
}
