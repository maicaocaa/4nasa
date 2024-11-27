<?php
require 'connection.php'; // Conexión a la base de datos
session_name('login');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sesusername= $_SESSION['username'];



// -------------------- busquea de usuario ---------------
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if($user){
        if(password_verify($password,$user['password'])){
            $_SESSION['username']= $username;
            $_SESSION['token']=$user['token'];
            header("Location:index.php");
            exit();
        } else {
            $info="Error en la contraseña. Intentalo de nuevo";
            header("Location: login.php?info=$info");
            exit();
        }
    }else{
        $info="El usuario no existe. Intentalo de nuevo";
        header("Location: login.php?info=$info");
        exit();
    }
}
?>

    
    </body>
</html>