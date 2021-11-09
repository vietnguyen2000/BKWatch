<?php

namespace Models;

class BlogCommentModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'blogcomment';
  }
}
