<?php
require_once('../conexion/conexion.php');

    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM mascota where codigo = '$codigo'";
    $query = mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_assoc($query);

?>

<?php
    $sqlcon = "SELECT * FROM tipo_control";
    $querycon = mysqli_query($conexion,$sqlcon);
    $filacon = mysqli_fetch_assoc($querycon);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controles</title>
    <link rel="stylesheet" href="../css/control.css">
</head>
<body>
    <div class="formulario">
        <form action="for-con.php" method="POST" autocomplete="off">
            <img class="logotipo " src="../img/veterinario.png" alt="">
            <h1 class="titulo">Realizar control a mascota</h1>
            <div class="regis">
                <input type="hidden" name="cod_control" id="cod_control" placeholder="Digita codigo control" required>
                <select name="tipo_control" id="tipo_control" required>
                    <option value="">Elije tipo de control</option>
                    <?php

                        foreach ($querycon as $tip_con) : ?>

                    <option value="<?php echo $tip_con['id_tip_control'] ?> ">
                        <?php echo $tip_con['tipo_control'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>

                <input type="hidden" name="codigo_dog" id="codigo_dog" class="codigo" value="<?php echo($fila['codigo'])?>">

                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del control" required>
                <input type="text" name="peso" id="peso" placeholder="Digite el peso en kg" required>
                <input type="text" name="altura" id="altura" placeholder="Digite la altura en cm" required>
                <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones del control" required>

                <input type="submit" class="enviar" name="enviar" id="enviar" value="Enviar">
            </div>
            
        </form>
    </div>        
    
</body>
</html>
