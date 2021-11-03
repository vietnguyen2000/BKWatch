<?php

namespace Models;

use function PHPSTORM_META\map;

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
      $sql = "SELECT * FROM ProductPreview";
      if ($limit != null) {
        $sql += 'LIMIT' . $limit;
      };
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      $data = array_map(function ($r) {
        $r['imageURLs'] = explode('||', $r['imageURL']);
        return $r;
      }, $data);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getById(int $id)
  {
    try {
      $sql = "SELECT * FROM ProductPreview WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $result =  $stmt->get_result();
      $product = $result->fetch_all(mode: MYSQLI_ASSOC)[0];
      $product['comments'] = $this->getComments($id);
      $product['imageURLs'] = explode('||', $product['imageURL']);
      return $product;
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getComments(int $id)
  {
    try {
      $sql = "SELECT * FROM ProductCommentView WHERE productId = ? ORDER BY updatedAt DESC";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $result =  $stmt->get_result();
      return $result->fetch_all(mode: MYSQLI_ASSOC);
    } catch (\Exception $e) {
      return [];
    }
  }
}
