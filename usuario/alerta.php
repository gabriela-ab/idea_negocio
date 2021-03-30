<?php

require_once('../conexion/conexion.php');

    $consulta_usu = "SELECT * FROM usuario, tipo_usuario WHERE usuario = '".$_SESSION['usuario']."' and usuario.id_tip_usu = tipo_usuario.id_tip_usu";
    $queryusu = mysqli_query($conexion,$consulta_usu);
    $filausu = mysqli_fetch_assoc($queryusu);
    $_SESSION['documento'] = $filausu['documento']; 
       
?>

<?php 
    $consulta_doc = "SELECT * FROM usuario WHERE documento = '".$_SESSION['documento']."'";
    $querydoc = mysqli_query($conexion,$consulta_doc);
    $filadoc = mysqli_fetch_assoc($querydoc);
    
?>
<?php 
    $consulta_masco = "SELECT * FROM mascota WHERE documento = '".$_SESSION['documento']."'";
    $querymasco = mysqli_query($conexion,$consulta_masco);
    $filamasco = mysqli_fetch_assoc($querymasco);
    
?>

<?php 
    $consulta_mas = "SELECT * FROM mascota, control WHERE documento = '".$_SESSION['documento']."' and mascota.codigo = control.codigo";
    $querymas = mysqli_query($conexion,$consulta_mas);
    $filamas = mysqli_fetch_assoc($querymas);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje alerta</title>
    <link rel="stylesheet" href="../css/alerta.css">
</head>
<body>

    <div class="formulario">
        <form action="con-alerta.php" method="POST">
            <h1>Ver control de mascota</h1>
            <select name="codigo" id="codigo" required>
                <option value="">Elije</option>
                <?php

                    foreach ($querymasco as $mascota) : ?>

                <option value="<?php echo $mascota['codigo'] ?> ">
                    <?php echo $mascota['nombre'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>
           
            <input type="submit" class="enviar" name="comprobar" value="Ver control">
            
        </form>

    </div>
    

   
    
   

    

    
</body>
</html>