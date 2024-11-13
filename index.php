<?php
$servername = "localhost";
$bd_username = "root";
$bd_password = "root";

// $conn = new mysqli($servername, $username, $password);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";

try {
    $conn = new PDO("mysql:host=$servername;dbname=nasa", $bd_username, $bd_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

//   $conn = null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>

</header>

<body>
    <h1>nasa</h1> 
    <p>bienvenidos a la nasa introduce tu login</p>


    <form method="POST" action="index.php">
        <label>tu nombre</label>
        <input type="text" id="usern" name="username" required/>
        <label>tu contraseña</label>
        <input type="password" id="password" name="password" required/>
        <input type="submit"/>
    </form>

    <p>
        <?php
        echo $_POST["username"]." ". $_POST["password"];
        ?>
    </p>

    <form method="GET" action=".">
        <p>si no estas logueado date de alta </p>
            <label>tu nombre</label>
            <input type="text" required/>
            <label>tu contraseña</label>
            <input type="password" required/>
            <input type="submit"/>
    </form>
</body>

<footer>

</footer>
</html>