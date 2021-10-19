<?php
$conn = require_once('../databases/connection.php');
class CartModel
{
  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }

  public function getAll()
  {
    $sql = "SELECT * FROM cart";
    $result = $this->conn->query($sql);
    return $result;
  }

  public function getById($id)
  {
    $sql = "SELECT * FROM cart WHERE id =" . $id;
    $result = $this->conn->query($sql);
    return $result;
  }

  public function insert(array $config)
  {
    try {
      $sql = "INSERT INTO cart (customerId, productId, quantity, currency, createdday, published) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("iiiisi", $config["customerId"], $config["productId"], $config["quantity"], $config["currency"], $config["createdday"], $config["published"]);
      $stmt->execute();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  public function update($id, array $config)
  {
    try {
      $sql = "UPDATE cart set customerId = ?, quantity = ?, currency = ?, createdday = ?, published = ? WHERE id = " . $id;
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("iiiisi", $config["customerId"], $config["productId"], $config["quantity"], $config["currency"], $config["createdday"], $config["published"]);
      $stmt->execute();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  public function delete($id)
  {
    try {
      $sql = "DELETE FROM cart WHERE id =" . $id;
      $this->conn->query($sql);
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}
