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

echo" este es el sign up  verify  ";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sesusername= $_SESSION['username'];

    echo" <p> username:  $username </p> ";
    echo" <p> password: $password </p> ";
    echo" <p> sesion: $sesusername </p> ";

// -------------------- busquea de usuario ---------------
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if($user){
        if(password_verify($password,$user['password'])){
            echo"exito, contraseña igual";
            echo $user['password'];
            echo $password;
        }else{
            echo'la contraseña no coincide';
            var_dump( $user['password']);
            var_dump ($password);
        }
    }else{
        echo 'usuario no encontrado, no hemso tenido ningun resutlado d ela bsuqueda';
    }
}