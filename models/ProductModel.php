<?php

namespace Models;

class ProductModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'product';
  }

  public function getAll(int $limit = null)
  {
    try {
      $sql = "SELECT product.*, productImage.imageURL FROM product JOIN productImage ON (product.id = productImage.productId)";
      if ($limit != null) {
        $sql += 'LIMIT' . $limit;
      };
      $result = $this->db->query($sql);
      $data = array();
      while ($row = $result->fetch_array()) {
        if (!isset($data[$row['id']])) {
          $data[$row['id']] = $row;
        }

        $data[$row['id']]['imageURLs'][] = $row['imageURL'];
      };
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
