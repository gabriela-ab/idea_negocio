<?php
require_once('../conexion/conexion.php');

if(isset($_POST["enviar"])){
    $codigo=$_POST['cod_compra'];
    $mascota=$_POST['mascota'];
    $producto=$_POST['producto'];
    $cantidad=$_POST['cantidad'];

    $comprobar = "SELECT * FROM compras WHERE id_compra='$codigo'";
    $consulta = mysqli_query($conexion, $comprobar);
    $fila = mysqli_fetch_assoc($consulta);

    if($fila){
        echo "<script> alert('Ya se registro una compra con este id')</script>";
        echo '<script> window.location="usuario.php"</script>';

    }
    else{
        $registrar = "INSERT INTO compras (id_compra, codigo, cod_produc, id_cantidad_produc)
        VALUES('$codigo','$mascota','$producto','$cantidad')";
        $validar = mysqli_query($conexion,$registrar);
        echo "<script> alert('Se guardaron los datos exitosamente. Gracias por su compra.')</script>";
        echo '<script> window.location="usuario.php" </script>';


    }
}