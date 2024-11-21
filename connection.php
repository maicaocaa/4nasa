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

  $username="maria";
  $password="abc123.";  //password_hash
  $api="miapi";

 //------------------------ FUNCIONA OK dar de alta ------------------
// $stmt =$conn->prepare("INSERT INTO users (username, password,token) VALUES (?,?,?)");

// $stmt ->bindParam(1,$username);
// $stmt ->bindParam(2,$password);
// $stmt->bindParam(3,$api);

// $stmt->execute();

// -----------TO DO RECOGER EL ERROR Y EL EXITO Y MOSTRARLO EN PANTALLA -------------

//------- TODO funciona bien , hay que implemtara ogica y error y exito, esto va en autenticacion
// $stmt =$conn->prepare("SELECT * FROM users ");

// $stmt->setFetchMode(PDO::FETCH_ASSOC);

// $stmt->execute();

// while ($row = $stmt->fetch()){
//     echo "Nombre: {$row["username"]} <br>";
//     echo "password: {$row["password"]} <br><br>"; 
//     echo "token: {$row["token"]} <br><br>";
// }

//password_verify(passintroducida, passde la bd)

?>