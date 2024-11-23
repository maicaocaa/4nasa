<?php
session_name('login');
session_start();


if (!isset($_SESSION['username'])){
  header('Location:login.php');
}

// // } else {
//   $username=$_POST["username"];
//   $password=$_POST["password"];
//   //recoge bien los datos del formulario
//   // echo $username;
//   // echo$password;

//   $stmt =$conn->prepare("SELECT * FROM users");

//  // $stmt ->bindParam(1,$username);
//   $stmt->setFetchMode(PDO::FETCH_ASSOC);



//   /// NO recoge bien los valores
//   $stmt->execute();
//   // $stmt->fetchAll(PDO::FETCH_ASSOC);   -> si pongo esto despues a mi no me funcion porq ue yo lo hago asoc y el objeto
//                                             // fetch all para objeto

//   //vemos lo que trae de la busqueda
//   var_dump($stmt->fetch());

//   while ($row = $stmt->fetch()){
//            echo "Nombre: {$row["username"]} <br>";
//     //     echo "password: {$row["password"]} <br><br>"; 
//     //     echo "token: {$row["token"]} <br><br>";




    ///credenciales correctas redirigue a index
    //sino imprime un error pero como lo imprime, con un alert en login?
  // }



?>