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

echo" este es el login verify  ";
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




// ------------------------------------------------------------
//     $query = "SELECT * FROM users WHERE username = ?";
//     $stmt = $conn->prepare($query);
//     $stmt->execute([$username]);

//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     foreach ($users as $user) {
//         // Procesar cada fila
//         echo "Username: {$user['username']}<br>";
//         echo "Password: {$user['password']}<br>";
//         echo "Token: {$user['token']}<br>";
//         password_verify($password, $usr['password']);
//     }
// --------------------------------------------------------------


    // Verificación de contraseña
    // if ($username === $user['username'] ) {
       
    //     echo" <p> username:  $username </p> ";
        
    //     // header("Location:index.php"); // Redirigir a la página principal
    //     echo"exito";
    //     exit();
    // } else {
    //     echo"no exito";
    //     echo" <p> username:  $username </p>";
    //     // header("Location:login.php?error=$password"); // Redirigir con un mensaje de error
    //     // header("Location:login.php")>
    //     exit();
    // }


    ?>

    
    </body>
</html>