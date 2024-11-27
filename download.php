<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['download'])){

       $file=$_GET['download'];
       $download_path = __DIR__ . '/downloads/' .basename($file);
       copy($file,$download_path);
    }
?>