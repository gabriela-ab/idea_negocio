<?php

require_once('../conexion/conexion.php');

    $consulta_usu = "SELECT * FROM usuario, tipo_usuario WHERE usuario = '".$_SESSION['usuario']."' and usuario.id_tip_usu = tipo_usuario.id_tip_usu";
    $query_usu = mysqli_query($conexion, $consulta_usu);
    $fila_usu = mysqli_fetch_assoc($query_usu);
    $_SESSION['documento'] = $fila_usu['documento'];
    $_SESSION['usuario'] = $fila_usu['usuario'];
?>

<?php
    $sql_pro = "SELECT * FROM producto";
    $querypro = mysqli_query($conexion,$sql_pro);
    $filapro = mysqli_fetch_assoc($querypro);
?>

<?php
    $sql_mas = "SELECT * FROM mascota WHERE documento = '".$_SESSION['documento']."'";
    $querymas = mysqli_query($conexion,$sql_mas);
    $filamas = mysqli_fetch_assoc($querymas);
?>
<?php
    $sql_cant = "SELECT * FROM cantidad_pructo";
    $querycant = mysqli_query($conexion,$sql_cant);
    $filacant = mysqli_fetch_assoc($querycant);
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
            <input type="hidden" name="cod_compra" id="cod_compra" placeholder="Digita codigo compra" required>

            <select name="mascota" id="mascota" required>
                <option value="">Elije cual mascota</option>
                <?php

                    foreach ($querymas as $mascota) : ?>

                <option value="<?php echo $mascota['codigo'] ?> ">
                    <?php echo $mascota['nombre'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>

            <select name="producto" id="producto" required>
                <option value="">Elije el producto</option>
                <?php

                    foreach ($querypro as $producto) : ?>

                <option value="<?php echo $producto['cod_produc'] ?> ">
                    <?php echo $producto['nom_produc'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>
            
            <select name="cantidad" id="cantidad" required>
                <option value="">Elije la cantidad</option>
                <?php

                    foreach ($querycant as $cantidad) : ?>

                <option value="<?php echo $cantidad['id_cantidad_produc'] ?> ">
                    <?php echo $cantidad['cantidad'] ?></option>
                <?php
                endforeach;
                ?>
            </select>

            <input type="submit" class="enviar" name="enviar" id="enviar" value="Enviar">
        </form>
    </div>
    
    
</body>
</html>