<?php

namespace Models;

class OrdersModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'orders';
  }
  public function getAllOrder()
  {
    try {
      $sql = "SELECT
      orders.id AS id, 
      orders.paymentMethod AS paymentMethod,
      orders.transactionNo AS transactionNo,
      user.fullname AS userFullname,
      user.username AS username,
      orders.total AS total,
      orders.address AS address,
      orders.shippingFee AS shippingFee,
      orders.status AS orderStatus,
      orders.updatedAt AS updatedAt,
      orders.createdAt AS createdAt
      FROM orders
      LEFT JOIN user ON user.id = orders.userId
      ORDER BY orders.id
      ";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getByCondition(array ...$conditions)
  {
    try {
      $name = 'ordersView';

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

      $sql = "SELECT * FROM $name WHERE $conditionSql ORDER BY createdAt DESC";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param($types, ...$valuesList);
      $stmt->execute();
      $result =  $stmt->get_result();
      return $result->fetch_all(mode: MYSQLI_ASSOC);
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getTotalOrder()
  {
    try {
      $sql = "SELECT COUNT(*) AS total FROM Orders";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data[0]['total'];
    } catch (\Exception $e) {
      return 0;
    }
  }
}
