<?php
require_once('../conexion/conexion.php');

?>
<?php

$sql_marca = "SELECT * FROM marca";
$querymarca = mysqli_query($conexion,$sql_marca);
$filamarca = mysqli_fetch_assoc($querymarca);
?>

<?php

$sql_prod = "SELECT * FROM tipo_producto";
$queryprod= mysqli_query($conexion,$sql_prod);
$filaprod = mysqli_fetch_assoc($queryprod);
?>

<?php

$sql_cant = "SELECT * FROM cantidad_pructo";
$querycant= mysqli_query($conexion,$sql_cant);
$filacant = mysqli_fetch_assoc($querycant);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
    <link rel="stylesheet" href="../css/productos.css">
</head>
<body>
    <div class="formulario">
        <form action="" method="POST" autocomplete="off">
            <h1 class="titulo">Registrar producto</h1>
            <input type="text" name="producto" id="producto" placeholder="Digita nombre de producto" required>
            
            <input type="number" name="precio" id="precio" placeholder="Digita el precio" required>

            <select name="marca" id="marca" required>
                <option value="">Elije la marca</option>
                <?php

                    foreach ($querymarca as $marca) : ?>

                <option value="<?php echo $marca['id_marca'] ?> ">
                    <?php echo $marca['nom_marca'] ?></option>
                <?php
                endforeach;
                ?>
            </select>

            <select name="tipo_producto" id="tipo_producto" required>
                <option value="">Elije tipo de producto</option>
                <?php

                    foreach ($queryprod as $tipo_prod) : ?>

                <option value="<?php echo $tipo_prod['id_tip_produc'] ?> ">
                    <?php echo $tipo_prod['tipo_produc'] ?></option>
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


            <input type="submit" class="enviar" name="registrar" id="registrar" value="Registrar">
        </form>
    </div>
    
    
</body>
</html>