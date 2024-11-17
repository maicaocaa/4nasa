<?php
session_name('login');
session_start();

    if (isset($_GET['date']) ){
        $date=$_GET["date"];
    }else{
        $date=date("Y-m-d");
    };

// ------------------ MONTAR LAS URL API --------------------
$api_key= "Xxy8xya3iNuhKad9jf7gJLTItZB8gKdaS5iG3b9i";
$picture_url="https://api.nasa.gov/planetary/apod?api_key=$api_key&date=".$date;
//$picture_url="https://api.nasa.gov/planetary/apod?api_key=$api_key";

//---------------- ASTRO NECESITA FECHA de icio y fin, se le pone la misma, sino repite los astros de ayer y hoy----------------
$astro_url="https://api.nasa.gov/neo/rest/v1/feed?start_date=$date&end_date=$date&api_key=$api_key";


//        REMAINING API seguro que va con las coookies

//$remaining_api=$_cookie("remaining_api");
//    REQUEST IN SESION

// ------------ CABECERA ---------------------------------
    $header=get_headers($picture_url,1);
    $limit=$header["X-Ratelimit-Limit"];
    $remaining=$header["X-Ratelimit-Remaining"];

// ------------ IMAGEN DEL DIA -------------------------------
        $response=file_get_contents("$picture_url");
        $data=json_decode($response);

        $title=$data->title;
        $APOD_url=$data->url;
        $explanation=$data->explanation;
        //$copyright no todas tienen
      
        // var_dump($data);
        
        //print_r(get_headers($picture_url, 1));

// ------------ METEORITOS ----------------------------------
    $astro_response=file_get_contents($astro_url);
    $astro_data=json_decode($astro_response,true);
    // var_dump($astro_data);
    $astro_near_earth_objects=$astro_data["near_earth_objects"];
   // var_dump($astro_near_earth_objects);
   echo "esto es la fecha $date";

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
        <h2>Hola <?php echo $_SESSION['username']; ?></h2>
        <button type="button"
            onclick="if (confirm('¿Estás seguro de que quieres desloguearte?')) { window.location.href = 'login.php'; }">
            Log out
        </button>

    <!-- ------------- LIMITE CONSULTAS------------ -->
        <p>Aqui las consultas que te quedan</p>
        <!-- <?php var_dump ($header); ?> -->
        <?php echo "<p>esto es limit $limit; </p>"; ?>
        <?php echo "<p>esto es remaining $remaining; </p>" ;?>
       
        <nav>
    <!------------------ FORMULARIO DE FECHA--------------- -->
                <form action="./index.php" method="GET">
                    <label for="date">introduce el dia</label>
                    <input type="date" name="date" id="date"
                        value="<?php echo $date?>" />
                    <input type="submit" value="vamos" />
                </form>

                <p><?php echo $date;?></p>
         </nav>
    </header>



    <main>
    <!------------------ METEORITOS--------------- -->
        <aside>
            <div class="astro">
                seccion meteorito
                <?php echo "<p>meteoritos cerca total =$astro_near_total</p>"; ?>
            </div>

            <div class="astro">
                seccion meteorito peligroso
                
                <?php 

                    $total_astro_dangerous=0;
                    $details_astro_dangerous="";

                    foreach($astro_near_earth_objects[$date] as $asteroid){
                        if ($asteroid["is_potentially_hazardous_asteroid"]) {

                            $total_astro_dangerous++;

                            $astro_name=$asteroid["name"];
                            $astro_orbit=$asteroid["close_approach_data"][0]["orbiting_body"];
                            $astro_diameter=$asteroid["estimated_diameter"]["kilometers"]["estimated_diameter_max"];
                            $astro_speed=$asteroid["close_approach_data"][0]["relative_velocity"]["kilometers_per_second"];
                            $astro_distance=$asteroid["close_approach_data"][0]["miss_distance"]["lunar"];
                            
                            $details_astro_dangerous .=
                           "<div class='astro danger'>
                            <p>name: $astro_name]</p>
                            <p>Orbit: $astro_orbit</p>
                            <p>Diameter: $astro_diameter Km</p>
                            <p>Speed: $astro_speed Km/s</p>
                            <p>Distance: $astro_distance Lunar</p>
                            </div>";
                        };
                    };

                    echo "<p>meteoritos peligrosos = $total_astro_dangerous;</p>"; 
                    echo $details_astro_dangerous; 

                 ?>

            </div>
        </aside>

        <section>
            <article> esta es la imagen del dia
                <p class="title"><?php echo $title ?></p>
              
    <!------------------ IMAGEN O VIDEO--------------- -->
                <?php
                    if ($data->media_type ==="video"){
                        echo"es video";
                        echo "<iframe src='$APOD_url' class='video'></iframe>";

                    }else if ($data->media_type ==="image"){
                        echo "<img width='50%'src='$APOD_url'class='image'></img>";
                        $save_path="./downloads";
                      
                    }
                echo "<p><a class='button'href='$APOD_url' download='nasa_imagen.jpg'>Descargar imagen</a></p>";
                echo "<p class='explanation'>explanation: $explanation</p>";
                ?> 
            </article>
        </section>

    </main>



      <!------------------ FOOTER-------------- -->
    <footer>
        <p>Creado por Maria Cao /  2024</p>
    </footer>
</body>

</html>