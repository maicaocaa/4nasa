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

        // cargamos la imagen del dia
        //$response=file_get_contents("$picture_url");
        // $data=json_decode($response);
        //$title=$data->title;
        // $explanation=$data->explanation;
        // var_dump($data);
        
        //print_r(get_headers($picture_url, 1));

        ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
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
        <!-- FORMULARIO DE FECHA -->
        <form action="./index.php" method="GET">
            <label for="date">introduce el dia</label>
            <input type="date" name="date" id="date"
                value="<?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : ''; ?>" />
            <input type="submit" value="vamos" />
        </form>

        <p><?php echo $_GET["date"];var_dump($_GET["date"]);?></p>
    </nav>

    <main>
        <aside>
            <div class="meteo">
                seccion meteorito
            </div>
            <div class="meteo danger">
                seccion meteorito peligroso
            </div>
        </aside>

        <section>
            <article> esta es la imagen del dia
                <p class="title">titulo</p>
                <p class="copyright">copyrigth</p>
                <img width='50%' src='https://www.nasa.gov/wp-content/uploads/2024/10/54069074925-af3166e6b9-o.jpg'
                    class='image'></img>"
                <!-- <?php
            // ES IMAGEN O VIDEO
            if ($data->media_type ==="video"){
                $video_url=$data->url;
                echo"es video";
                echo "<iframe src='$video_url' class='video'></iframe>";

            }else if ($data->media_type ==="image"){
                $img_url=$data->url;
                echo"es imagen";
                echo "<img width='50%'src='$img_url'class='image'></img>";
            }
           echo "<p class='explanation'>explanation: $explanation</p>"
        ?> -->
                <p class='explanation'>What created this huge space bubble? Blown by the wind from a star, this
                    tantalizing, head-like apparition is cataloged as NGC 7635, but known simply as the Bubble Nebula.
                    The featured striking view utilizes a long exposure to reveal the intricate details of this cosmic
                    bubble and its environment. Although it looks delicate, the 10 light-year diameter bubble offers
                    evidence of violent processes at work. Seen here above and right of the Bubble's center, a bright
                    hot star is embedded in the nebula's reflecting dust. A fierce stellar wind and intense radiation
                    from the star, which likely has a mass 10 to 20 times that of the Sun, has blasted out the structure
                    of glowing gas against denser material in a surrounding molecular cloud. The intriguing Bubble
                    Nebula lies a mere 11,000 light-years away toward the boastful constellation Cassiopeia. Your Sky
                    Surprise: What picture did APOD feature on your birthday? (post 1995)</p>

            </article>
        </section>

    </main>
    <footer>
        <p>Creado por Maria Cao /  2024</p>
    </footer>
</body>

</html>