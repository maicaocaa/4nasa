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
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $token = $_POST['token'];
        $sesusername = $_SESSION['username'];

        //---------BUSCA USUARIO ----------------
        try {
            $query = "SELECT count(username) FROM users WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$username]);

            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($count);

            if ($count['count(username)'] > 0) {
                $info = "El usuario ya existe. Intenta con otro username";
                header("Location: signUp.php?info=$info");
                exit();

                //-----------INSERTA USUARIO-----------
            } else {
                $query = "INSERT INTO users (username, password,token) VALUES (?,?,?)";
                $stmt = $conn->prepare($query);
                $stmt->execute([$username, $hashed_password, $token]);

                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $info = "Usuario grabado ok, inicia sesion";
                header("Location: login.php?info=$info");
            }
        } catch (PDOException $e) {
            $info = "Error al grabar los datos";
            header("Location: signUp.php?info=$info");
            exit();
        }
    }
