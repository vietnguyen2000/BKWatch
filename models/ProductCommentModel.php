<?php

namespace Models;

class ProductCommentModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'productComment';
  }
}