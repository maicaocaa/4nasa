<?php
//require "login.php";
$date=$_GET["date"];
//$picture_url="https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=".$date;
//$astro_url="https://api.nasa.gov/neo/rest/v1/neo/browse?api_key=DEMO_KEY";
// &date=2014-10-01&concept_tags=True
//$api_key= "Xxy8xya3iNuhKad9jf7gJLTItZB8gKdaS5iG3b9i";
//        REMAINING API seguroq ue va con las coookies
//$remaining_api=get_headers($picture_url, 1;
//$remaining_api=$_cookie("remaining_api");
//    REQUEST IN SESION
//
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <header>
        <h1>nasa index</h1>
        <p>esto es el index</p>
        <p>Aqui las consultas que te quedan</p>
        <?php // echo $remaining_api; ?>
        <button type="button" 
                onclick="if (confirm('¿Estás seguro de que quieres desloguearte?')) { window.location.href = 'login.php'; }">
                Log out
        </button>
    </header>

    <nav> 
        <form action="./index.php" method="GET" >
            <label for="date">introduce el dia</label>
            <input type="date" name="date" id="date" value="<?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : ''; ?>"/>
            <input type="submit" value="vamos" />
        </form>

        <p><?php echo $_GET["date"];var_dump($_GET["date"]);
     
        echo $picture_url;
        ?></p>
    </nav>

    <main>
        <aside>
            <div>
                seccion meteorito
            </div>
            <div>
                seccion meteorito peligroso
            </div>
        </aside>
    
    <section>
    <article>
    esta es la imagen del dia
        <?php
        // cargamos la imagen del dia
        $response=file_get_contents("$picture_url");
        $data=json_decode($response);
        var_dump($data);
        
        echo "<br>";
        echo "<br>";
        echo "<br>";
        //print_r(get_headers($picture_url, 1));

        ?>
       
    </article>
</section>

    </main>
    <footer>

    </footer>
</body>

</html>