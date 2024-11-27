<?php 

$servername = "localhost";
$db_username = "admin";
$db_password = "abc123.";
$db_name="nasa";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
  } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  };
?>