<?php

namespace Model;

class ProductCategoryModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'productCategory';
  }
}
