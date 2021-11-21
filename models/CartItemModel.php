<?php

namespace Models;

class CartItemModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'cartItem';
  }

  public function getAll(int $limit = null)
  {
    $name = 'cartView';
    try {
      $sql = "SELECT * FROM $name";
      if ($limit != null) {
        $sql += 'LIMIT' . $limit;
      };
      $result = $this->db->query($sql);
      return $result->fetch_all(mode: MYSQLI_ASSOC);
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getCartQuantity($userId)
  {
    $name = 'cartView';
    try {
      $sql = "SELECT SUM(quantity) FROM $name WHERE (userId = ?)";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('s', $userId);
      $stmt->execute();
      $result =  $stmt->get_result();
      return $result->fetch_row()[0];
    } catch (\Exception $e) {
      return 0;
    }
  }

  public function getByCondition(array ...$conditions)
  {
    $name = 'cartView';
    try {
      $listSql = [];
      $types = "";
      $valuesList = [];

      foreach ($conditions as $condition) {
        $keysList = array_keys($condition);
        $v = array_values($condition);
        $keys = join("`= ? AND `", $keysList);
        $cTypes = $this->getTypeBindParam($v);
        $sql = "( `$keys` = ? )";
        $listSql[] = $sql;
        $types = $types . $cTypes;
        array_push($valuesList, ...$v);
      };

      $conditionSql = join(" OR ", $listSql);

      $sql = "SELECT * FROM $name WHERE $conditionSql";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param($types, ...$valuesList);
      $stmt->execute();
      $result =  $stmt->get_result();
      return $result->fetch_all(mode: MYSQLI_ASSOC);
    } catch (\Exception $e) {
      return [];
    }
  }

  public function clear(string $userId)
  {
    try {
      $sql = "DELETE FROM $this->name WHERE (userId = ?)";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('s', $userId);
      $stmt->execute();
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }
}
