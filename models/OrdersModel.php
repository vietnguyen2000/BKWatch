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
      bkwatch.orders.id AS id, 
      bkwatch.orders.paymentMethod AS paymentMethod,
      bkwatch.orders.transactionNo AS transactionNo,
      bkwatch.user.fullname AS userFullname,
      bkwatch.user.username AS username,
      bkwatch.orders.total AS total,
      bkwatch.orders.address AS address,
      bkwatch.orders.shippingFee AS shippingFee,
      bkwatch.orders.status AS orderStatus,
      bkwatch.orders.updatedAt AS updatedAt,
      bkwatch.orders.createdAt AS createdAt
      FROM bkwatch.orders
      LEFT JOIN bkwatch.user ON bkwatch.user.id = bkwatch.orders.userId
      ORDER BY bkwatch.orders.id
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
