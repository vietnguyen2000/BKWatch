<?php
require_once 'models/BaseModel.php';
class ProductCommentModel extends BaseModel
{
  public function __construct(\mysqli $db)
  {
    parent::__construct($db);
    $this->name = 'productComment';
  }
}
