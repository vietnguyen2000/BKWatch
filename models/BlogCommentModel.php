<?php

namespace Models;

class BlogModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'blog';
  }
}
