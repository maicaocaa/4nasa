<?php
$servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name="nasa";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form method="POST" action="index.php">
          <label>tu nombre</label>
          <input type="text" id="usern" name="username" required/>
          <label>tu contraseña</label>
          <input type="password" id="password" name="password" required/>
          <input type="submit" value="Entrar"/>
  </form>

</body>
</html>

<?php

// $conn = new mysqli($servername, $username, $password);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

//   $conn = null;
?>