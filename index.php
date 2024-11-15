<?php
require autentication.php;
require ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>

</header>

<body>
    <h1>nasa</h1> 
    <p>bienvenidos a la nasa introduce tu login</p>


   

    <p>
        <?php
         echo $_POST["username"]." ". $_POST["password"];
        ?>
    </p>

    <form method="POST" action=".">
        <p>si no estas logueado date de alta </p>
            <label>tu nombre</label>
            <input type="text" id="username" name="new_username" required/>
            <label>tu contraseña </label>
            <input type="password1" id="password" name ="new_password1"required/>
            <label>repite tu contraseña </label>
            <input type="password2" id="password" name="new_password2"required/>
            <label>tu token</label>
            <input type="password" id="token" name="new_token" required/>
            <button type="submit" value="Darse de alta">ALTA</button>   
            <button type="reset" value="borra todo">Reset</button>
        

            
</body>

<footer>

</footer>
</html>