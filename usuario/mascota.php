<?php
require_once('../conexion/conexion.php');

    $consulta_usu = "SELECT * FROM usuario, tipo_usuario WHERE usuario = '".$_SESSION['usuario']."' and usuario.id_tip_usu = tipo_usuario.id_tip_usu";
    $queryusu = mysqli_query($conexion,$consulta_usu);
    $filausu = mysqli_fetch_assoc($queryusu);
    $_SESSION['documento'] = $filausu['documento'];

?>
<?php

    $sqlmas = "SELECT * FROM tipo_mascota";
    $querymas = mysqli_query($conexion,$sqlmas);
    $filamas = mysqli_fetch_assoc($querymas);
?>

<?php

    $sqlge = "SELECT * FROM genero";
    $queryge = mysqli_query($conexion,$sqlge);
    $filage = mysqli_fetch_assoc($queryge);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascota</title>
    <link rel="stylesheet" href="../css/mascota.css">
</head>
<body>

    <div class="formulario">
        <form action="regis-mas.php" method="POST" autocomplete="off">
        <img class="logotipo " src="../img/veterinario.png" alt="">
            <h1 class="titulo">Registrar mascota</h1>
            <div class="regis">
                <input type="hidden" name="codigo" id="codigo" placeholder="Digita codigo mascota" required>
                <input type="text" name="nombre" id="nombre" placeholder="Digita el nombre" required>
                <select class="mascota" name="tipo_mas" id="tipo_mas" required>
                    <option value="">Elije tipo mascota</option>
                    <?php

                        foreach ($querymas as $tip_mas) : ?>

                    <option value="<?php echo $tip_mas['id_tip_mascota'] ?> ">
                        <?php echo $tip_mas['tipo_mascota'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="text" name="raza" id="raza" placeholder="Digita la raza" required>
                <input type="text" name="edad" id="edad" placeholder="Digita la edad" required>
                <select name="genero" id="genero" required>
                    <option value="">Elije genero</option>
                    <?php

                        foreach ($queryge as $genero) : ?>

                    <option value="<?php echo $genero['id_genero'] ?> ">
                        <?php echo $genero['genero'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="hidden" name="documento" id="documento" class="documento" value="<?php echo($filausu['documento'])?>">
                <input type="submit" class="enviar" name="registrar" id="registrar" value="Registrar">
                
            </div>
            
        </form>
    </div>
    
</body>
</html>
