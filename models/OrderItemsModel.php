<?php

namespace Models;

class OrderItemModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'orderItems';
  }
}
