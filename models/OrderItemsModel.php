<?php

namespace Models;

class OrderItemsModel extends BaseModel
{
  public function __construct()
  {
    parent::__construct();
    $this->name = 'orderItems';
  }

  public function getByCondition(array ...$conditions)
  {
    try {
      $name = 'orderItemsView';

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
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      $data = array_map(function ($r) {
        $r['imageURLs'] = explode('||', $r['imageURL']);
        $r['imagePreview'] = $r['imageURLs'][0];
        return $r;
      }, $data);
      return $data;
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getTotalProductSales()
  {
    try {
      $sql = "SELECT SUM(quantity) AS total FROM OrderItems";
      $result = $this->db->query($sql);
      $data = $result->fetch_all(mode: MYSQLI_ASSOC);
      return $data[0]['total'];
    } catch (\Exception $e) {
      return 0;
    }
  }
}
