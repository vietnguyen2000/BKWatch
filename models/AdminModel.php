<?php

namespace Models;

class AdminModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'admin';
  }
}
