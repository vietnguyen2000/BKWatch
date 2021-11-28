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
      bkwatch.orders.total AS total,
      bkwatch.orders.shippingFee AS shippingFee,
      bkwatch.orders.status AS orderStatus,
      bkwatch.orders.updatedAt AS updatedAt
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
}
