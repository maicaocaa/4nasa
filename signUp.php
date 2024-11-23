
<?php
require "connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

}
?>


//fomrualrio de crear usuario y donde se hace el insert a la bd

// if (isset($_SERVER)$_POST["new_password1"] !== $_POST["new_password2"]) {
//                         echo "las contraseñas no coinciden";
//} else {
    header
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA IMAGEN DEL DIA</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
</head>


<body class="w3-metro-light-blue w3-text-white" 
      >
   
   <section class="w3-container w3-display-container w3-center" style="height: 100vh;"> 
        <div class="w3-row" style="display: flex; justify-content: center; align-items: center; height: 100%;">

            <div class="w3-col l5 m5 s12 w3-padding " style="justify-content:center;">
                <div class="w3-container w3-center "><img style="width:50%; margin-bottom: 20px;" src="./img/NASAlogo.png"></div>
                
                <form class="w3-container  w3-black" action="autentication.php" method="POST">
                    <h2 class="w3-text-white">Date de alta en Nasa APOD</h2>
                
                    <label class="w3-text-white"><b>Nombre de usuario</b></label>
                    <input class="w3-input w3-border" name="username" type="text" required></p>
                    
                    <label class="w3-text-white"><b>Contraseña</b></label>
                    <input class="w3-input w3-border" type="password" name="password" required></p>

                    <label class="w3-text-white"><b>Repite la contraseña</b></label>
                    <input class="w3-input w3-border" type="password" name="password2" required></p>

                    <label class="w3-text-white"><b>Token</b></label>
                    <input class="w3-input w3-border" type="text" name="token" required></p>
            
                    <button type= submit class="w3-button w3-black w3-border w3-border-red">Darse de alta</button></p>
                </form>
                <p>No tienes token? Consigue el tuyo <a href="https://api.nasa.gov/">aquí</a></p>
                <p>Volver a <a href="login.php">login</a></p>

            </div>
        </div>  
    </section>

    <!-- // las sesiones para que son  son para pasar inforamcion entre paguina y paguina?
    //------------------- duda si crea usar ok a donde redirigue? a index? -->
</body>
</html>