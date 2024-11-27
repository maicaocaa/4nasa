<?php
require 'autentication.php';

//---------- DATE valida si hay fecha en el formulario sino la inicializa con el dia de hoy
$date = $_GET['date'] ?? date("Y-m-d");


//---------- USERNAME valida si hay usuario 
$username = $_SESSION['username'] ?? "visitante del espacio";

//---------- COOKIES valida si hay cookies definidas, sino las iniciliza con 1
if (!isset($_COOKIE['requests'])) {
    setcookie("requests", 1, time() + 3600 * 365 * 24);
    $requests = 1;
} else {
    $requests = $_COOKIE['requests'];
    $requests++;
    setcookie("requests", $requests, time() + 3600 * 365 * 24);
};

//---------- APIS URL ASTRO NECESITA FECHA INICIO Y FIN
$api_key = $_SESSION['token'];
$picture_url = "https://api.nasa.gov/planetary/apod?api_key=$api_key&date=$date";
$astro_url = "https://api.nasa.gov/neo/rest/v1/feed?start_date=$date&end_date=$date&api_key=$api_key";


// ------------ CABECERAS ---------------------------------
$header = get_headers($picture_url, 1);
$limit = $header["X-Ratelimit-Limit"];
$remaining = $header["X-Ratelimit-Remaining"];

// ------------ IMAGEN DEL DIA -------------------------------
$response = @file_get_contents($picture_url);
if ($response !== false) {
    $data = json_decode($response);
} else {
    $data = "Estamos sacando la foto! danos unos minutitos";
}

$title = $data->title;
$APOD_url = $data->url;
$explanation = $data->explanation;

// ------------ METEORITOS ----------------------------------
$astro_response = file_get_contents($astro_url);
$astro_data = json_decode($astro_response, true);
$astro_near_earth_objects = $astro_data["near_earth_objects"];

$total_astro_dangerous = 0;
$details_astro_dangerous = "";

foreach ($astro_near_earth_objects[$date] as $asteroid) {
    if ($asteroid["is_potentially_hazardous_asteroid"]) {

        $total_astro_dangerous++;

        $astro_name = $asteroid["name"];
        $astro_orbit = $asteroid["close_approach_data"][0]["orbiting_body"];
        $astro_diameter = $asteroid["estimated_diameter"]["kilometers"]["estimated_diameter_max"];
        $astro_speed = $asteroid["close_approach_data"][0]["relative_velocity"]["kilometers_per_second"];
        $astro_distance = $asteroid["close_approach_data"][0]["miss_distance"]["lunar"];

        $details_astro_dangerous .=
            "<div class='w3-row'>
                <div class='w3-margin-bottom ' >
                    <div class='w3-card-4 w3-dark-grey'>
                        <header class='w3-container w3-red'>
                                <p>$astro_name</p>
                        </header>
                        <div class='w3-text-white w3-container' >
                            <p>Orbita: $astro_orbit</p>
                            <p>Diametro: $astro_diameter Km</p>
                            <p>Velocidad: $astro_speed Km/s</p>
                            <p>Distancia: $astro_distance Lunar</p>
                        </div>
                    </div>
                </div>
           </div>";
    };
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
    <link rel="stylesheet" href="./styles.css">
</head>


<body class="w3-black w3-text-white">

    <header class="w3-black  ">

        <!-- ---------------- USERNAME, HEADERS Y COOKIES--------------- -->
        <div class="w3-text-light-grey w3-dark-grey" id="top-banner">
            Hola
            <?php echo "$username.   Quedan: $remaining de $limit consultas/hora.  Histórico de consultas: $requests "; ?>
        </div>

        <div id="navbar">
            <div id="title-logo">
                <img class="w3-bar-item" src="img/NASAlogo.png" style="width: 150px;">
                <p class="w3-bar-item">A PICTURE OF THE DAY - NASA</p>

                <!-- ---------------- FORMULARIO DE FECHA--------------- -->
                <div class="form-date">
                    <form action="index.php" method="GET" class="form-inline">
                        <input type="date" name="date" id="date" value="<?php echo $date ?>" />
                        <input class="w3-button w3-black w3-border w3-border-red " type="submit" value="VER FOTO" />
                    </form>
                </div>
            </div>

            <!-- ---------------- BOTON SALIR--------------- -->
            <button id="btn-logout" class="w3-bar-item w3-button w3-right w3-black w3-border w3-border-red"
                onclick="if (confirm('¿Estás seguro de que quieres desloguearte?')) { window.location.href = 'login.php'; }"> SALIR
            </button>
        </div>
    </header>

    <main>
        <!------------------ METEORITOS--------------- -->
        <aside>
            <div class="astro">
                <h6>Información meteorítica</h6>
                <?php $astro_near_total = count($astro_near_earth_objects);
                echo "<p>Meteoritos cercanos: $astro_near_total</p>"; ?>

                <div class="astro-danger">
                    <?php
                    echo "<p>Meteorítos peligrosos: $total_astro_dangerous</p>";
                    echo "<div class='w3-row-padding w3-margin-top'> $details_astro_dangerous </div>";
                    ?>
                </div>
            </div>
        </aside>

        <!------------------ IMAGEN O VIDEO y BOTON DE DESCARGA--------------- -->
        <section class="w3-black ">
            <p class="title"><?php echo "$title / $date" ?></p>
            <?php
            if ($data->media_type === "video") {
                echo "<iframe src='$APOD_url' tyle= 'width='560px' height='315px' frameborder='0'  allowfullscreen' ></iframe>";
            } else if ($data->media_type === "image") {
                echo "<img src=$APOD_url class='image'>";
                echo
                "<form method=GET action='download.php' target='iframe'  onsubmit='alert(\"Imagen en carpeta Downloads\")' >
                             <input name='download' value=$APOD_url hidden>
                             <button type=submit  class='w3-button w3-black w3-border w3-border-red'>DESCARGAR IMAGEN</button>
                             </form>";
                echo "<iframe name='iframe' style='display:none'></iframe>";
            }

            echo "<p class='explanation'> $explanation</p>";
            ?>
        </section>
    </main>

    <!------------------ FOOTER-------------- -->
    <footer class="w3-container w3-metro-darken">
        <p>Creado por Maria Cao / 2024</p>
    </footer>
</body>
</html>