<?php

namespace Model;

class CustomerModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'customer';
  }
}
