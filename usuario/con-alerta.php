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
        echo '<p>' .'<b>' ."Codigo: ".'</b>' . $fila["id_control"] .'</p>';
        echo '<p>' .'<b>' ."Tipo control: ".'</b>' . $fila["tipo_control"] .'</p>';
        echo '<p>' .'<b>' ."Nombre de mascota: ".'</b>' . $fila["nombre"] .'</p>';
        echo '<p>' .'<b>' ."Descripcion del control: ".'</b>' . $fila["descripcion"] .'</p>';
        echo '<p>' .'<b>' ."Peso de mascota: ".'</b>' . $fila["tipo_peso"] .'</p>';
        echo '<p>' .'<b>' ."Altura de mascota: ".'</b>' . $fila["tipo_altura"] .'</p>';
        echo '<p>' .'<b>' ."Fecha de ingreso: ".'</b>' . $fila["fecha"] .'</p>';
        echo '<p>' .'<b>' ."Proxima fecha revision: ".'</b>' . $fila["proxima_fecha"] .'</p>';
        echo '<p>' .'<b>' ."Observaciones del control: ".'</b>' . $fila["observaciones"] .'</p>';
        echo "<a href='usuario.php'>" . "<p> Volver </p>" . "</a>";
    }
    else{
        echo "<script> alert('Aun no se ha realizado el control a tu mascota.')</script>";
        echo '<script> window.location="usuario.php" </script>';
    }

}
?>
