<?php
$hostname="localhost";
$username="root";
$password= "";
$database="veterinaria";
$conexion = new mysqli($hostname,$username,$password,$database);

if($conexion ->connect_errno)
{
  die("fallo la conexion con la base de datos $database" . mysqli_connect_errno());
}
session_start();

?>