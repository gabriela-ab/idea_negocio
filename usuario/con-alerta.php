<?php

require_once('../conexion/conexion.php');

if($_POST["comprobar"]){

    $codigo = $_POST["codigo"];

    $consulta = "SELECT * FROM control WHERE codigo='$codigo'";
    $query = mysqli_query($conexion,$consulta);
    $fila = mysqli_fetch_assoc($query);

    if($fila){

        $consulta = "SELECT * FROM control, tipo_control, mascota, peso, altura WHERE control.id_tip_control = tipo_control.id_tip_control and control.codigo = mascota.codigo and
        control.id_peso = peso.id_peso and control.id_altura = altura.id_altura";
        $query = mysqli_query($conexion,$consulta);
        $fila = mysqli_fetch_assoc($query);
        echo '<p>' ."Codigo: ". $fila["id_control"] .'</p>';
        echo '<p>' ."Tipo control: ". $fila["tipo_control"] .'</p>';
        echo '<p>' ."Nombre de mascota: ". $fila["nombre"] .'</p>';
        echo '<p>' ."Descripcion del control: ". $fila["descripcion"] .'</p>';
        echo '<p>' ."Peso de mascota: ". $fila["tipo_peso"] .'</p>';
        echo '<p>' ."Altura de mascota: ". $fila["tipo_altura"] .'</p>';
        echo '<p>' ."Fecha de ingreso: ". $fila["fecha"] .'</p>';
        echo '<p>' ."Proxima fecha revision: ". $fila["proxima_fecha"] .'</p>';
        echo '<p>' ."Observaciones del control: ". $fila["observaciones"] .'</p>';
        echo "<a href='usuario.php'>" . "<p> Volver </p>" . "</a>";
    }
    else{
        echo "<script> alert('Aun no se ha realizado el control a tu mascota.')</script>";
        echo '<script> window.location="usuario.php" </script>';
    }

}
?>
