<?php
 require autentication.php;
//  header(Prepared:)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOSTRAP -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->


</head>
<body>


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
                            //https://diego.com.es/tutorial-de-pdo
                           // https://www.w3schools.com/php/php_mysql_prepared_statements.asp ,ejor el perpared
                           // ver la recofiga de datos como array http://phpdeilusions.net/
                           //password_hash() https://www.php.net/manual/en/function.password-hash.php
                           //password_verify()
                    
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
</html>