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

<?php
    $sqlpeso = "SELECT * FROM peso";
    $querypeso = mysqli_query($conexion,$sqlpeso);
    $filapeso = mysqli_fetch_assoc($querypeso);
?>

<?php
    $sqlalt = "SELECT * FROM altura";
    $queryalt = mysqli_query($conexion,$sqlalt);
    $filaalt = mysqli_fetch_assoc($queryalt);
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
            <h1 class="titulo">Realizar control a la mascota</h1>
            <div class="regis">
                
                <input type="hidden" name="cod_control" id="cod_control" placeholder="Digita codigo control" required>
                
                <select class="controles" name="tipo_control" id="tipo_control" required>
                    <option value="">Elije tipo de control</option>
                    <?php

                        foreach ($querycon as $tip_con) : ?>

                    <option value="<?php echo $tip_con['id_tip_control'] ?> ">
                        <?php echo $tip_con['tipo_control'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>

                <input type="hidden" name="codigo" id="codigo" class="codigo" value="<?php echo($fila['codigo'])?>">
                
                <textarea name="descripcion" id="descripcion" placeholder="Descripcion del control" required></textarea>
                
                <select name="peso" id="peso" required>
                    <option value="">Elije el peso</option>
                    <?php

                        foreach ($querypeso as $peso) : ?>

                    <option value="<?php echo $peso['id_peso'] ?> ">
                        <?php echo $peso['tipo_peso'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>

                <select name="altura" id="altura" class="altura" required>
                    <option value="">Elije la altura</option>
                    <?php

                        foreach ($queryalt as $altura) : ?>

                    <option value="<?php echo $altura['id_altura'] ?> ">
                        <?php echo $altura['tipo_altura'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                
                <textarea name="observaciones" id="observaciones" placeholder="Observaciones del control" required></textarea>

                <input type="submit" class="enviar" name="enviar" id="enviar" value="Enviar">
            </div>
            
        </form>
    </div>        
    
</body>
</html>
