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


    $consulta_masco = "SELECT control.proxima_fecha, control.fecha FROM mascota, control WHERE documento = '".$_SESSION['documento']."' ";
    $querymasco = mysqli_query($conexion,$consulta_masco);
    $filamasco = mysqli_fetch_assoc($querymasco);

    //a la fecha actual sumarle 10 dias e imprimirla
    $ahora = time();

    $limite = strtotime("+10 day", $ahora);
    $limite_spa = date("d-m-Y  H:i:s", $limite);
    $dia = date("d","m",$limite);
    $r = $dia -$ahora;
    

    $limite = strtotime("+10 day",$ahora);
    $limite_spa = date("d", $limite);
    
    $dia = date("d",$limite);


    if($filamasco){
        echo '<h2>' ."Proxima fecha del control: ". $filamasco["proxima_fecha"] .'</h2>';
        echo "<h2>el dia $dia, debe venir para una revision</h2>";
        echo '<hr />';
        '<br>';




        echo "<h2>la proxima fecha del control es: $limite_spa</h2>";
        echo "<h2>el dia $dia, debes venir para una revision</h2>";
        echo '<hr />';
        
        
    }
    else{
        echo 'no has registrado nada :(';


    }
    

?>

    
  
</body>
</html>