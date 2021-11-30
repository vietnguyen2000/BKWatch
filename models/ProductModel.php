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

  public function getAll(int $limit = null, int $offset = null, $sort = null)
  {
    try {
      $sql = "SELECT * , count(*) OVER() AS fullCount FROM ProductPreview ";

      if ($sort != null) {
        $sql .= $sort . ' ';
      }

      if ($limit != null) {
        $sql .= 'LIMIT ' . $limit . ' ';
      };

      if ($offset != null) {
        $sql .= 'OFFSET ' . $offset . ' ';
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
  public function getProductByCondition(string $sort = "", string $cond = "", array $category = [], array $brand = [])
  {
    try {
      $sortQuery = "";
      $searchQuery = "";
      $categoryQuery = "";
      $brandQuery = "";
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
      // if (empty($cond)) {
      //   return $this->getAll(null, $sortQuery);
      // }
      if ($cond != "") {
        $search = "";
        $search_arr = explode(" ", $cond);
        foreach ($search_arr as $value_search_arr) {
          $search .= "|" . $value_search_arr;
        }
        $search = substr($search, 1);
        $searchQuery = "AND CONCAT_WS('', productCode, title, content, tag, categoryTitle, brandTitle) REGEXP '$search' ";
      }
      if (!empty($category)) {
        foreach ($category as $value) {
          $categoryQuery .= "|" . $value;
        }
        $categoryQuery = substr($categoryQuery, 1);
        $categoryQuery = "AND CONCAT_WS('', categoryTitle) REGEXP '$categoryQuery' ";
      }
      if (!empty($brand)) {
        foreach ($brand as $value) {
          $brandQuery .= "|" . $value;
        }
        $brandQuery = substr($brandQuery, 1);
        $brandQuery = "AND CONCAT_WS('', brandTitle) REGEXP '$brandQuery' ";
      }
      $queryAll = $searchQuery . $brandQuery . $categoryQuery;
      $searchAllQuery = "";
      if (!empty($queryAll)) {
        $queryAll = substr($queryAll, 3);
        $searchAllQuery = "WHERE $queryAll";
      }
      $sql = "SELECT * FROM productpreview $searchAllQuery $sortQuery";
      // print_r($sql);
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
      $sql = "SELECT productcategory.id AS id, productcategory.title AS title FROM productcategory";
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
      $sql = "SELECT productbrand.id AS id, productbrand.title AS title FROM productbrand";
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
  public function getAllCategoryHelp()
  {
    try {
      $sql = "SELECT productcategory.id AS id, productcategory.title AS title FROM productcategory";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getAllBrandHelp()
  {
    try {
      $sql = "SELECT productbrand.id AS id, productbrand.title AS title FROM productbrand";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
  public function getImageHelpById(int $id)
  {
    try {
      $sql = "SELECT productImage.id AS id, productImage.imageURL AS imageURL FROM productImage WHERE productImage.productId = $id";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }
}
