<?php

namespace Model;

class CartModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'cart';
  }
}
