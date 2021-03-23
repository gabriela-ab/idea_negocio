<?php
require_once('../conexion/conexion.php');

    $codigo = $_GET['codigo'];
    $sql = "SELECT * FROM mascota where codigo = '$codigo'";
    $query = mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_assoc($query);

?>
<?php
    $sql_codigo = "SELECT * FROM mascota";
    $query_codigo = mysqli_query($conexion,$sql_codigo);
    $fila_codigo = mysqli_fetch_assoc($query_codigo);
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
</head>
<body>
    <div class="formul">
        <form action="" method="POST">
            <select name="tipo_docu" id="tipo_docu" required>
                <option value="">Elije tipo de control</option>
                <?php

                    foreach ($querycon as $tip_con) : ?>

                <option value="<?php echo $tip_con['id_tip_control'] ?> ">
                    <?php echo $tip_con['tipo_control'] ?></option>
                <?php
                endforeach;
                ?>
            </select>

            <input type="hidden" name="codigo" id="codigo" class="codigo" value="<?php echo($fila_codigo['codigo'])?>">
            <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del control" required>
            <input type="text" name="peso" id="peso" placeholder="Digite el peso en kg" required>
            <input type="text" name="altura" id="altura" placeholder="Digite la altura en cm" required>
            <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones del control" required>
            <input type="datetime-local" name="fecha" id="fecha">
            <input type="submit" name="enviar" id="enviar" value="Enviar">
        </form>
    </div>
    
</body>
</html>
