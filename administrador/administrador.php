<?php
require_once('../conexion/conexion.php');

    $consulta_admin = "SELECT * FROM usuario, tipo_usuario WHERE usuario = '".$_SESSION['usuario']."' and usuario.id_tip_usu = tipo_usuario.id_tip_usu";
    $query_admin = mysqli_query($conexion, $consulta_admin);
    $fila_admin = mysqli_fetch_assoc($query_admin);
    $_SESSION['documento'] = $fila_admin['documento'];
    $_SESSION['usuario'] = $fila_admin['usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Administrador</title>
    <link rel="stylesheet" href="../css/stylo_admin.css">
    
</head>
<body>
    <div class="container1">
        <h1> </h1>
        <h2>ADMINISTRADOR</h2>
        <figure>
            <img src="../img/veterinario.png" alt="logo de la pagina">
        </figure>
    </div>
    <div>
        <div class="menu">
            <ul>
                <li><a href="administrador.php"></a>INICIO</a></li>
                <li><a href="mascotas.php">MASCOTAS</a></li>
                <li><a href="buscador2.php">USUARIOS</a></li>
                <li><a href="inventario.php">INVENTARIO</a></li>
                <li><a href="../php/salir.php"><img witdh="40px" height="50px" src="../img/cerrar-sesion.png" alt=""></a></li>
            </ul>
                       
        </div>
    </div>

   <h1 class="saludo">BIENVENIDO</h1>
   <div>
   
   </div>
   
</body>
</html>