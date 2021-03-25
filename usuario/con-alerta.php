<?php

require_once('../conexion/conexion.php');

$documento = $_POST["documento"];
$codigo = $_POST["codigo"];

$pregunta = "SELECT * FROM mascota where codigo='$codigo'";
$query1 = mysqli_query($conexion,$pregunta);
$fila1 = mysqli_fetch_assoc($query1);


$consulta = "SELECT * FROM control, tipo_control, mascota WHERE control.id_tip_control = tipo_control.id_tip_control and control.codigo = mascota.codigo";
$query = mysqli_query($conexion,$consulta);
$fila = mysqli_fetch_assoc($query);

if($fila){
    echo '<p>' ."Codigo: ". $fila["id_control"] .'</p>';
    echo '<p>' ."Tipo control: ". $fila["tipo_control"] .'</p>';
    echo '<p>' ."Nombre de mascota: ". $fila["nombre"] .'</p>';
    echo '<p>' ."Descripcion del control: ". $fila["descripcion"] .'</p>';
    echo '<p>' ."Peso de mascota: ". $fila["peso"] .'</p>';
    echo '<p>' ."Altura de mascota: ". $fila["altura"] .'</p>';
    echo '<p>' ."Fecha de ingreso: ". $fila["fecha"] .'</p>';
    echo '<p>' ."Proxima fecha revision: ". $fila["proxima_fecha"] .'</p>';
    echo '<p>' ."Observaciones del control: ". $fila["observaciones"] .'</p>';
    echo "<a href='usuario.php'>" . "<p> Volver </p>" . "</a>";
}
else{
    echo "<script> alert('Aun no se ha realizado el control a tu mascota.')</script>";
    echo '<script> window.location="consult.php" </script>';
}

