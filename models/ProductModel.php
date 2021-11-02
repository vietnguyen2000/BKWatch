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
}
