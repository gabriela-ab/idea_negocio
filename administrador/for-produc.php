<?php
require_once('../conexion/conexion.php');

if(isset($_POST['registrar'])){
    $codigo_produc=$_POST['codigo_produc'];
    $producto=$_POST['producto'];
    $precio=$_POST['precio'];
    $marca=$_POST['marca'];
    $tipo_producto=$_POST['tipo_producto'];
    $cantidad=$_POST['cantidad'];

    $comprobar = "SELECT * FROM producto WHERE cod_produc='$codigo_produc'";
    $consulta = mysqli_query($conexion, $comprobar);
    $fila = mysqli_fetch_assoc($consulta);

    if($fila){
        echo "<script> alert('El codigo del producto ya se encuentra')</script>";
        echo '<script> window.location="administrador.php"</script>';
    }
    else{
        $registrar = "INSERT INTO producto (cod_produc, nom_produc, precio, id_marca, id_tip_produc, id_cantidad_produc)
        VALUES('$codigo_produc','$producto','$precio','$marca','$tipo_producto','$cantidad')";
        $validar = mysqli_query($conexion,$registrar);
        echo "<script> alert('Se guardaron los datos exitosamente.')</script>";
        echo '<script> window.location="administrador.php" </script>';
    }
    
}
?>