<?php

namespace Models;

class ProductImageModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'productImage';
  }
}
