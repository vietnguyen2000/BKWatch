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

  public function getAll(int $limit = null, $sort = null)
  {
    try {
      $sql = "SELECT * FROM ProductPreview ";
      if ($limit != null) {
        $sql .= 'LIMIT' . $limit;
      };
      if ($sort != null) {
        $sql .= $sort;
      }
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
  public function getProductByCondition(array $cond = [], $sort = "")
  {
    try {
      $sortQuery = "";
      if ($sort == 1) {
        $sortQuery = "ORDER BY price DESC";
      }
      if ($sort == 2) {
        $sortQuery = "ORDER BY price ASC";
      }
      if ($sort == 3) {
        $sortQuery = "ORDER BY title ASC";
      }
      if ($sort == 4) {
        $sortQuery = "ORDER BY title DESC";
      }
      if (empty($cond)) {
        return $this->getAll(null, $sortQuery);
      }
      $search = "";
      if (isset($cond['search'])) {
        $search .= $cond['search'];
      }
      if (isset($cond['tag'])) {
        $search .= "|" . $cond['tag'];
      }
      if (isset($cond['brand'])) {
        $search .= "|" . $cond['brand'];
      }
      if (isset($cond['category'])) {
        $search .= "|" . $cond['category'];
      }
      $sql = "SELECT * FROM bkwatch.productpreview 
      WHERE CONCAT_WS('', 
      productCode, 
      title, 
      content, 
      tag, 
      categoryTitle, 
      brandTitle) 
      REGEXP '$search' " . $sortQuery;
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

  public function getAllCategory()
  {
    try {
      $sql = "SELECT bkwatch.productcategory.id AS id, bkwatch.productcategory.title AS title FROM bkwatch.productcategory";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      foreach ($data as $key_data => $value_data) {
        $data[$key_data]['title'] = strtolower($value_data['title']);
      }
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getAllBrand()
  {
    try {
      $sql = "SELECT bkwatch.productbrand.id AS id, bkwatch.productbrand.title AS title FROM bkwatch.productbrand";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      foreach ($data as $key_data => $value_data) {
        $data[$key_data]['title'] = strtolower($value_data['title']);
      }
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
