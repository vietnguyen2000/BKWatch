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
      bkwatch.productcomment.id AS id,
      bkwatch.product.productCode AS productCode,
      bkwatch.user.fullname AS userCmtFullname,
      bkwatch.productcomment.content AS userCmtContent,
      bkwatch.productcomment.rating AS userCmtRating,
      bkwatch.productcomment.updatedAt AS userCmtTime
      FROM bkwatch.productcomment
      LEFT JOIN bkwatch.product ON bkwatch.product.id = bkwatch.productcomment.productId
      LEFT JOIN bkwatch.user ON bkwatch.user.id = bkwatch.productcomment.userId
      ORDER BY bkwatch.product.id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
