<?php

namespace Models;

class BlogImageModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'blogImage';
  }
}
