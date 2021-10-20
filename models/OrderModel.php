<?php

namespace Models;

class OrderModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'order';
  }
}
