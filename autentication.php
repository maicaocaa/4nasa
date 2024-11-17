<?php
session_name('login');
session_start();
if (!isset($_SESSION['username'])){
  header('Location:login.php');
}

$servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name="nasa";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
  } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }



?>