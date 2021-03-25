<?php
require_once('../conexion/conexion.php');

if(isset($_POST["enviar"])){
    $codigo=$_POST['cod_compra'];
    $producto=$_POST['producto'];
    $documento=$_POST['documento'];
    $cantidad=$_POST['cantidad'];

    $comprobar = "SELECT * FROM detalle_control WHERE id_detalle='$codigo'";
    $consulta = mysqli_query($conexion, $comprobar);
    $fila = mysqli_fetch_assoc($consulta);

    if($fila){
        echo "<script> alert('Ya se registro un producto con ese id')</script>";
        echo '<script> window.location="usuario.php"</script>';

    }
    else{
        $registrar = "INSERT INTO detalle_control (id_detalle, documento, cod_produc, cantidad_produc)
        VALUES('$codigo','$documento','$producto','$cantidad')";
        $validar = mysqli_query($conexion,$registrar);
        echo "<script> alert('Se guardaron los datos exitosamente.')</script>";
        echo '<script> window.location="usuario.php" </script>';


    }
}