<?php
    $hostname = "localhost";
    $user ="root";
    $password = "";
    $database = "veterinaria";
    $mysqli = new mysqli ($hostname,$user,$password,$database);
    if($mysqli ->connect_errno)
    {
        die("fallo la conexion con la base de datos $database" . mysqli_connect_errno() );
    }echo('todo esta bien');
    
    ?>