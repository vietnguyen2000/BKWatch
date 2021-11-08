<?php

namespace Models;

class CartItemModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'cartItem';
  }
}
