<?php

require_once('../conexion/conexion.php');

    $consulta_usu = "SELECT * FROM usuario, tipo_usuario WHERE usuario = '".$_SESSION['usuario']."' and usuario.id_tip_usu = tipo_usuario.id_tip_usu";
    $query_usu = mysqli_query($conexion, $consulta_usu);
    $fila_usu = mysqli_fetch_assoc($query_usu);
    $_SESSION['documento'] = $fila_usu['documento'];
    $_SESSION['usuario'] = $fila_usu['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Usuario</title>
    <link rel="stylesheet" href="../css/usuario.css">
    
</head>
<body>
    <div class="container1">
        <h1> </h1>
        <h2>USUARIO</h2>
        <figure>
            <img src="../img/veterinario.png" alt="logo de la pagina">
        </figure>
    </div>
    <div>
        <div class="menu">
            <ul>
                <li><a href="usuario.php">INICIO</a></li>
                <li><a href="mascota.php">REGISTRAR MASCOTA</a></li>
                <li><a href="compra.php">COMPRAR PRODUCTOS</a></li>
                <li><a href="alerta.php">CONTROL</a></li>
                <li><a href="../php/salir.php"><img width="40px" height="50px" src="../img/cerrar-sesion.png" alt=""></a></li>
            </ul>                
        </div>
    </div>

   <h1 class="saludo">BIENVENIDO</h1>
    
   <?php

$ahora = time();
$limite = strtotime($ahora);

$a = date("m",$ahora);
$d = date("d",$ahora);


echo "<h2 >proximo control</h2>";
echo  "<hr /> ";


    $ahora = time();

    $limite = strtotime("+10 day", $ahora);
    $limite_spa = date("d-m-y  H:i:s", $limite);
   
    $dia = date("d",$limite);
    echo "<h1>$limite_spa</h1>";
    echo '<hr />';
    

     if($ahora >= $dia){
        echo "<script> alert('$limite_spa  !! REALIZAR CONTROL ¡¡    ')</script>";
       

    }else echo 'tranquilo';



?>
  
</body>
</html>