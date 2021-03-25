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
    $consulta_mas = "SELECT * FROM mascota WHERE documento = '".$_SESSION['documento']."'";
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
</head>
<body>
    

   <form action="con-alerta.php" method="POST">
       <h1>Ver control de mascota</h1>
        <select name="documento" id="documento" required>
            <option value="">Elije</option>
            <?php

                foreach ($querydoc as $documento) : ?>

            <option value="<?php echo $documento['documento'] ?> ">
                <?php echo $documento['nombres'] ?></option>
            <?php
                endforeach;
            ?>
        </select>
        <input type="hidden" name="codigo" id="codigo" value="<?php echo($filamas['codigo'])?>">
        <input type="submit" name="comprobar" value="Ver control">
        
   </form>
    
   

    

    
</body>
</html>