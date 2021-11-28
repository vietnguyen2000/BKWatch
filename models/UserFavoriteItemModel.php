<?php

namespace Models;

use Utils\Utils;

class UserFavoriteItemModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'userFavoriteItem';
  }

  public function getProductViewByUserId($userId)
  {
    try {
      $sql = "SELECT * FROM userFavoriteItemView WHERE userId = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('i', $userId);
      $stmt->execute();
      $result =  $stmt->get_result();
      $products = $result->fetch_all(mode: MYSQLI_ASSOC);
      foreach ($products as &$product) {
        $product['imageURLs'] = explode('||', $product['imageURL']);
      }
      return $products;
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getFavoriteQuantity($userId)
  {
    try {
      $sql = "SELECT COUNT(*) FROM $this->name WHERE (userId = ?)";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('s', $userId);
      $stmt->execute();
      $result =  $stmt->get_result();
      return $result->fetch_row()[0];
    } catch (\Exception $e) {
      return 0;
    }
  }
}
