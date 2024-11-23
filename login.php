<?php

// if($_SERVER['REQUEST_METHOD']==='POST'){
//     $username=$_POST['username'];
//     $password=$_POST['password'];
// };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA IMAGEN DEL DIA</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
         body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
 

</head>
<body class="w3-black w3-text-white" " 
        style="
        background-image: url('img/Obaidly.jpg');
        background-size: cover;
        background-attachment: fixed; 
        background-repeat: no-repeat;
        display:flex; flex-direction:column;
        min-height: 100vh;">
   
  
    <section class="w3-container w3-display-container w3-center" style="height: 100vh;"> 
        <div class="w3-row" style="display: flex; justify-content: center; align-items: center; height: 100%;">

            <div class="w3-col l2 m5 s12  w3-padding">
                <h3 class="w3-text-light-blue w3-bold">{API NASA} </h3>
                <p class="w3-text-metro-light-blue">Bienvenido al portal de API de la NASA. El objetivo de este sitio es hacer que los datos de la NASA, incluidas las imágenes, sean sumamente accesibles para los desarrolladores de aplicaciones. Este catálogo se centra en API de uso general y fácil de usar, y no incluye todas las API de la NASA. </p>
            </div>

            <div class="w3-col l5 m5 s12 w3-padding " style="justify-content:center;">
                <div class="w3-container w3-center "><img style="width:50%; margin-bottom: 20px;" src="./img/NASAlogo.png"></div>

                <form class="w3-container  w3-metro-darken" action="login_verify.php" method="POST">
                    <h2 class="w3-text-white">Bienvenido a Nasa APOD</h2>
                    <p>Introduce tus datos</p>
                
                    <label class="w3-text-white"><b>Nombre de usuario</b></label>
                    <input class="w3-input w3-border" name="username" type="text" required></p>
                    
                    <label class="w3-text-white"><b>Contraseña</b></label>
                    <input class="w3-input w3-border" type="password" name="password" required></p>
            
                    <button type= submit class="w3-button w3-black w3-border w3-border-red">Registrarse</button></p>
                </form>

                <p>No tienes cuenta? <a href="signUp.php">Date de alta</a></p>
                <p>Consigue tu token <a href="https://api.nasa.gov/">aqui</a></p>

            </div>
        </div>  
    </section>


  


<?php 
                    
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

                        //try {
                            // Conectar a la base de datos
                            // $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
                            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                            // // Preparar la consulta
                            // $sql = "INSERT INTO users (username, password, token) VALUES (:new_username, :new_password, :new_token)";
                            // $stmt = $conn->prepare($sql);
                            //https://diego.com.es/tutorial-de-pdo
                           // https://www.w3schools.com/php/php_mysql_prepared_statements.asp ,ejor el perpared
                           
                           // ver la recofiga de datos como array http://phpdeilusions.net/
                           //password_hash() https://www.php.net/manual/en/function.password-hash.php
                           //password_verify()
                    

                           // lo hacemos con la web d eprepared de w3school con el lazy ?git
                            // Asignar valores con seguridad para evitar inyección SQL

                        //     $stmt->bindParam(':new_username', $_POST["new_username"]);
                        //     $stmt->bindParam(':new_password', $_POST["new_password1"]);
                        //     $stmt->bindParam(':new_token', $_POST["new_token"]);
                        //     var_dump($stmt);
                        //     // Ejecutar la consulta
                        //     $stmt->execute();
                          
                        //     echo "Nuevo registro creado con éxito";
                        // } catch (PDOException $e) {
                        //     echo "Error: " . $e->getMessage();
                        // }

                        //$conn = null;
                    // };
             ?> 

    </form>


    
</body>
</html>