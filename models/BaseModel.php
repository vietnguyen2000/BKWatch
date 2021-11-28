<?php

namespace Models;


abstract class BaseModel
{
  public $db; // db connection
  public $name; // db name table

  public function __construct()
  {
    global $conn;
    $this->db = $conn;
    $this->name = ' '; // change it in children
  }

  public function getAll(int $limit = null)
  {
    try {
      $sql = "SELECT * FROM $this->name";
      if ($limit != null) {
        $sql += 'LIMIT' . $limit;
      };
      $result = $this->db->query($sql);
      return $result->fetch_all(mode: MYSQLI_ASSOC);
    } catch (\Exception $e) {
      return [];
    }
  }

  public function getByCondition(array ...$conditions)
  {
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

      $sql = "SELECT * FROM $this->name WHERE $conditionSql";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param($types, ...$valuesList);
      $stmt->execute();
      $result =  $stmt->get_result();
      return $result->fetch_all(mode: MYSQLI_ASSOC);
    } catch (\Exception $e) {
      return [];
    }
  }

  public function insert(array $payload)
  {
    try {
      $keysList = array_keys($payload);
      $valuesList = array_values($payload);
      $keys = join("`, `", $keysList);
      $valuesNeed = join(", ", array_map(fn ($v) => '?', $valuesList));
      $types = $this->getTypeBindParam($valuesList);

      $sql = "INSERT INTO `$this->name` (`$keys`) VALUES ($valuesNeed);";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param($types, ...$valuesList);
      $stmt->execute();

      $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
      $lastId = $stmt->fetch_row();

      return $lastId[0];
    } catch (\Exception $e) {
      return false;
    }
  }

  public function updateById(string $id, array $payload)
  {
    try {
      $keysList = array_keys($payload);
      $valuesList = array_values($payload);
      $keys = join("`= ?, `", $keysList);
      $types = $this->getTypeBindParam($valuesList);

      $sql = "UPDATE $this->name set `$keys` = ? WHERE `id` = $id";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param($types, ...$valuesList);
      $stmt->execute();
      return $stmt->affected_rows;
    } catch (\Exception $e) {
      print_r($e);
      return false;
    }
  }

  public function update(array $payload, ...$conditions)
  {
    try {
      $keysList = array_keys($payload);
      $valuesList = array_values($payload);
      $keys = join("`= ?, `", $keysList);
      $types = $this->getTypeBindParam($valuesList);

      $listSql = [];

      foreach ($conditions as $condition) {
        $keysList = array_keys($condition);
        $v = array_values($condition);
        $keysCondition = join("`= ? AND `", $keysList);
        $cTypes = $this->getTypeBindParam($v);
        $sql = "( $keysCondition = ? )";
        $listSql[] = $sql;
        $types = $types . $cTypes;
        array_push($valuesList, ...$v);
      };

      $conditionSql = join(" OR ", $listSql);

      $sql = "UPDATE $this->name set `$keys` = ? WHERE $conditionSql";
      // print_r($sql);
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param($types, ...$valuesList);
      $stmt->execute();
      return $stmt->affected_rows;
    } catch (\Exception $e) {
      return false;
    }
  }

  public function delete($id)
  {
    try {
      $sql = "DELETE FROM `$this->name` WHERE `id` = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param('s', $id);
      $stmt->execute();
      return $stmt->affected_rows;
    } catch (\Exception $e) {
      return false;
    }
  }

  public function deleteListIds($ids = [])
  {
    try {
      if (count($ids) == 0) return 0;
      $listParam = array_map(fn ($x) => '?', $ids);
      $paramsString = join(', ', $listParam);
      $sql = "DELETE FROM `$this->name` WHERE `id` in ($paramsString)";
      $stmt = $this->db->prepare($sql);
      $stmt->bind_param(join(array_map(fn ($x) => 's', $ids)), ...$ids);
      $stmt->execute();
      return $stmt->affected_rows;
    } catch (\Exception $e) {
      return false;
    }
  }

  protected function getTypeBindParam(array $arrays)
  {
    $mapFunc = function (mixed $value): string {
      $type = gettype($value);
      switch ($type) {
        case "boolean":
        case "integer":
          return "i";
        case "double":
          return "d";
        case "string":
        default:
          return "s";
      }
    };

    $types = array_map($mapFunc, $arrays);
    return join('', $types);
  }
}
