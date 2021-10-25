<?php

namespace Models;

class CustomerModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'customer';
  }
}
