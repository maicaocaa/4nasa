<?php 

    if (isset($_GET['download'])){

       $file=$_GET['download'];
       $download_path = __DIR__ . '/downloads/' .basename($file);
       copy($file,$download_path);
    }
?>