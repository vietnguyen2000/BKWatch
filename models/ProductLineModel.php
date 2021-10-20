<?php

namespace Models;

class ProductLineModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'productLine';
  }
}
