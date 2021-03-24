<?php

require_once('../conexion/conexion.php');

    $consulta_usu = "SELECT * FROM usuario, tipo_usuario WHERE usuario = '".$_SESSION['usuario']."' and usuario.id_tip_usu = tipo_usuario.id_tip_usu";
    $queryusu = mysqli_query($conexion,$consulta_usu);
    $filausu = mysqli_fetch_assoc($queryusu);
    $_SESSION['documento'] = $filausu['documento'];    
?>

<?php 
    $consulta_doc = "SELECT * FROM mascota, control WHERE mascota.codigo = control.codigo";
    $querydocu = mysqli_query($conexion,$consulta_doc);
    $filadocu = mysqli_fetch_assoc($querydocu);
?>

<?php
    $consulta_mas = "SELECT * FROM control where codigo = ";
    $querymas = mysqli_query($conexion,$consulta_mas);
    $filamas= mysqli_fetch_assoc($querymas);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje alerta</title>
</head>
<body>
    <p><?php echo $filausu['documento'] ?></p>
    <p><?php echo $filadocu['documento'] ?></p>
    <p><?php echo $filamas['codigo'] ?></p>

    

    
</body>
</html>