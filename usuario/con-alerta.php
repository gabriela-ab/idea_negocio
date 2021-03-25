<?php

require_once('../conexion/conexion.php');

$documento = $_POST["documento"];
$codigo = $_POST["codigo"];

$consulta = "SELECT * FROM control WHERE codigo='$codigo'";
$query = mysqli_query($conexion,$consulta);
$fila = mysqli_fetch_assoc($query);

$consul = "SELECT * FROM control, tipo_control, mascota WHERE control.id_tip_control = tipo_control.id_tip_control and control.codigo = mascota.codigo";
$query1 = mysqli_query($conexion,$consul);
$filat = mysqli_fetch_assoc($query1);


if($filat){
    echo '<p>' ."Codigo: ". $filat["id_control"] .'</p>';
    echo '<p>' ."Tipo control: ". $filat["tipo_control"] .'</p>';
    echo '<p>' ."Nombre de mascota: ". $filat["nombre"] .'</p>';
    echo '<p>' ."Descripcion del control: ". $filat["descripcion"] .'</p>';
    echo '<p>' ."Peso de mascota: ". $filat["peso"] .'</p>';
    echo '<p>' ."Altura de mascota: ". $filat["altura"] .'</p>';
    echo '<p>' ."Fecha de ingreso: ". $filat["fecha"] .'</p>';
    echo '<p>' ."Proxima fecha revision: ". $filat["proxima_fecha"] .'</p>';
    echo '<p>' ."Observaciones del control: ". $filat["observaciones"] .'</p>';
    echo "<a href='usuario.php'>" . "<p> Volver </p>" . "</a>";
}
else{
    echo "<script> alert('Aun NO se ha realizado el control a tu mascota.')</script>";
    echo '<script> window.location="usuario.php" </script>';
}

