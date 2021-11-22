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
      $product['rate'] = $this->getAvgRate($id);
      return $product;
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getProductByValue(string $value)
  {
    try {
      $sql = "SELECT * FROM bkwatch.productpreview WHERE 
      productCode LIKE '%$value%'
      OR  title LIKE '%$value%'
      OR content LIKE '%$value%' 
      OR tag LIKE '%$value%'
      OR brandTitle LIKE '%$value%'
      OR categoryTitle LIKE '%$value%'";
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

  public function getAvgRate(int $id)
  {
    try {
      $sql = "SELECT AVG(rating) as avgRate FROM ProductCommentView WHERE productId = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $result =  $stmt->get_result();

      $res = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $res[0]['avgRate'];
    } catch (\Exception $e) {
      return 0;
    }
  }
}
