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
        $hashed_password= password_hash($password,PASSWORD_DEFAULT);
        $token=$_POST['token'];
        $sesusername= $_SESSION['username'];

        echo" <p> username:  $username </p> ";
        echo" <p> password: $password </p> ";
        echo" <p> sesion: $sesusername </p> ";

    try {
        $query = "SELECT count(username) FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$username]);

        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($count);

        if ($count['count(username)']>0){
            echo"usuario existe";
            //header("Location: login.php?error=usuario_existente");
            exit();

        } else {
            $query = "INSERT INTO users (username, password,token) VALUES (?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->execute([$username,$hashed_password,$token]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            echo"grabado con exito";
        }

        
    } catch (PDOException $e) {
       // header("Location: login.php?error=error_alta");
       echo"error excepcion $e";
        exit();

    }
    // -------------------- alta  de usuario ---------------


   
}