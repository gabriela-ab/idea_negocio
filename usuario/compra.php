<?php

require_once('../conexion/conexion.php');

    $consulta_usu = "SELECT * FROM usuario, tipo_usuario WHERE usuario = '".$_SESSION['usuario']."' and usuario.id_tip_usu = tipo_usuario.id_tip_usu";
    $query_usu = mysqli_query($conexion, $consulta_usu);
    $fila_usu = mysqli_fetch_assoc($query_usu);
    $_SESSION['documento'] = $fila_usu['documento'];
    $_SESSION['usuario'] = $fila_usu['usuario'];
?>

<?php
    $sql1 = "SELECT * FROM producto";
    $query1 = mysqli_query($conexion,$sql1);
    $fila1 = mysqli_fetch_assoc($query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de productos</title>
    <link rel="stylesheet" href="../css/compra.css">
</head>
<body>
    <div class="formulario">
        <form action="for-com.php" method="POST">
            <h1>Compra de productos</h1>
            <input type="hidden" name="cod_compra" id="cod_compra" placeholder="Digita codigo control" required>

            <select name="producto" id="producto" required>
                <option value="">Elije el producto</option>
                <?php

                    foreach ($query1 as $producto) : ?>

                <option value="<?php echo $producto['cod_produc'] ?> ">
                    <?php echo $producto['nom_produc'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>
            <input type="hidden" name="documento" id="documento" class="documento" value="<?php echo($fila_usu['documento'])?>">

            <input type="text" name="cantidad" id="cantidad" placeholder="Digita la cantidad" required>
            <input type="submit" class="enviar" name="enviar" id="enviar" value="Enviar">
        </form>
    </div>
    
    
</body>
</html>