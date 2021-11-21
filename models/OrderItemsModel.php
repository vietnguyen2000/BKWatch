<?php

namespace Models;

class OrderItemsModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'orderItems';
  }
}
