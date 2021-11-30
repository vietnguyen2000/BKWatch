<?php

namespace Models;

class ProductCommentModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'productComment';
  }
  public function getAllComment()
  {
    try {
      $sql = "SELECT 
      productcomment.id AS id,
      product.productCode AS productCode,
      user.fullname AS userCmtFullname,
      productcomment.content AS userCmtContent,
      productcomment.rating AS userCmtRating,
      productcomment.updatedAt AS userCmtTime
      FROM productcomment
      LEFT JOIN product ON product.id = productcomment.productId
      LEFT JOIN user ON user.id = productcomment.userId
      ORDER BY product.id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
