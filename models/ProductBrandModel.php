<?php

namespace Model;

class ProductBrandModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'productBrand';
  }
}
