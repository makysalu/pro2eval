<?php
    require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registro</title>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <?php 
            echo "<script src='".JS."/modernizr-custom.js'></script>"; 
            echo "<script src='".JS."/registro.js'></script>"; 
            echo "<script src='".JS."/bootstrap.min.js'></script>";
            
            echo "<link rel='icon' type='image/png' href='".IMG."/dibujo.svg.png'>";
            echo "<link rel='stylesheet' href='".CSS."/normalize.css'>" ;
            echo "<link rel='stylesheet' href='".CSS."/font.css'>" ;
            echo "<link rel='stylesheet' href='".CSS."/style.css'>" ;
            echo "<link rel='stylesheet' href='".CSS."/bootstrap.min.css'>" ;
        ?>
    </head>
<body>