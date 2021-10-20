<?php

namespace Database;

// Create connection
$conn = mysqli_connect(
  $database_server,
  $database_username,
  $database_password,
  $database_name,
  $database_port
);



// Check connection
if (!$conn) {
  echo "<script>console.error('Cannot connect database, please check your config');</script>";
  die("Connection failed: " . mysqli_connect_error());
}

function getDBConnection(): \mysqli
{
  global $conn;
  return $conn;
}
