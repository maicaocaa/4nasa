<?php
$servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name="nasa";

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
        <input type="submit" value="Entrar"/>
    </form>

    <p>
        <?php
         echo $_POST["username"]." ". $_POST["password"];
        ?>
    </p>

    <form method="POST" action=".">
        <p>si no estas logueado date de alta </p>
            <label>tu nombre</label>
            <input type="text" id="username" name="new_username" required/>
            <label>tu contraseña </label>
            <input type="password1" id="password" name ="new_password1"required/>
            <label>repite tu contraseña </label>
            <input type="password2" id="password" name="new_password2"required/>
            <label>tu token</label>
            <input type="password" id="token" name="new_token" required/>
            <button type="submit" value="Darse de alta">ALTA</button>   
            <button type="reset" value="borra todo">Reset</button>
        

            <?php 
                    
                    if ($_POST["new_password1"] !== $_POST["new_password2"]) {
                        echo "las contraseñas no coinciden";
                    }else {
                    
                        // try {
                        //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        //     // set the PDO error mode to exception
                        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //     $sql = "INSERT INTO users (username, password , token)
                        //     VALUES ($_POST["new_user"], $_POST["new_password1"], $_POST["new_token"])";
                        //     // use exec() because no results are returned
                        //     $conn->exec($sql);
                        //     echo "New record created successfully";
                        // } catch(PDOException $e) {
                        //     echo $sql . "<br>" . $e->getMessage();
                        // }

                        try {
                            // Conectar a la base de datos
                            $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                            // Preparar la consulta
                            $sql = "INSERT INTO users (username, password, token) VALUES (:new_username, :new_password, :new_token)";
                            $stmt = $conn->prepare($sql);
                    
                            // Asignar valores con seguridad para evitar inyección SQL
                            $stmt->bindParam(':new_username', $_POST["new_username"]);
                            $stmt->bindParam(':new_password', $_POST["new_password1"]);
                            $stmt->bindParam(':new_token', $_POST["new_token"]);
                            var_dump($stmt);
                            // Ejecutar la consulta
                            $stmt->execute();
                          
                            echo "Nuevo registro creado con éxito";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }

                        $conn = null;
                    };
             ?> 

    </form>
</body>

<footer>

</footer>
</html>