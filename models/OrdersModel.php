<?php

namespace Models;

class OrdersModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'orders';
  }
}
