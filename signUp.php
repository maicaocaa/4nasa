<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['info'])){
        $info=$_GET['info'];    
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
                
                <form class="w3-container  w3-black" action="signUp_verify.php" method="POST">
                    <h2 class="w3-text-white">Date de alta en Nasa APOD</h2>
                     
                    <?php if (isset ($info)){echo"<p class='w3-text-blue'>$info</p>"; } ?> 
                    <label class="w3-text-white"><b>Nombre de usuario</b></label>
                    <input class="w3-input w3-border" name="username" type="text" required></p>
                    
                    <label class="w3-text-white"><b>Contraseña</b></label>
                    <input class="w3-input w3-border" type="password" id="password" name="password" required></p>

                    <label class="w3-text-white"><b>Repite la contraseña</b></label>
                    <input class="w3-input w3-border" type="password" id="confirmPassword" name="confirm_password" required></p>

                    <!-- mensaje de error -->
                    <p id="errorMessage" class="w3-border w3-text-red" style ="display:none;">Las contraseñas no coinciden</p>

                    <label class="w3-text-white"><b>Token</b></label>
                    <input class="w3-input w3-border" type="text" name="token" required></p>
            
                    <button type= submit id="submitButton"class="w3-button w3-black w3-border w3-border-red">Darse de alta</button></p>
                </form>
                <p>No tienes token? Consigue el tuyo <a href="https://api.nasa.gov/">aquí</a></p>
                <p>Volver a <a href="login.php">login</a></p>

            </div>
        </div>  
    </section>

    
    <script>
        function validatePasswords() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var errorMessage = document.getElementById("errorMessage");
            var submitButton = document.getElementById("submitButton");

            // sino coinciden display pasa a block
            if (password !== confirmPassword) {
                errorMessage.style.display = "block"; // Mostrar el mensaje de error
                submitButton.disabled = true; // Deshabilitar el botón de submit
            } else {
                errorMessage.style.display = "none"; // Ocultar el mensaje de error
                submitButton.disabled = false; // Habilitar el botón de submit
            }
        }

        // va mostrando a tiempo real los cambios
        document.getElementById("password").addEventListener("input", validatePasswords);
        document.getElementById("confirmPassword").addEventListener("input", validatePasswords);
    </script>
</body>
</html>