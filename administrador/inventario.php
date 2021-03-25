<?php
require_once('../conexion/conexion.php');
    $sql = "SELECT * FROM producto, inventario, marca, tipo_producto where producto.cod_produc = inventario.cod_produc and producto.id_marca = marca.id_marca
    and producto.id_tip_produc = tipo_producto.id_tip_produc";
    $query = mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_assoc($query);

?>

<?php
$consulta = "SELECT COUNT(nom_produc) FROM producto";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
</head>
<body>
    <div class="tabla">
        <h1>Productos</h1>
        <table class="productos">
            <tr>
                <td class="principal">Producto</td>
                <td class="principal">Marca</td>
                <td class="principal">Tipo producto</td>
                <td class="principal">Precio</td>
                <td class="principal">Cantidad Total</td>
                
                
            </tr>
            <tr>
                <?php
                    foreach ($query as $contenido){
                        echo "<tr>";
                        echo '<td>' . $contenido["nom_produc"] .'</td>';
                        echo '<td>' . $contenido["nom_marca"] .'</td>';
                        echo '<td>' . $contenido["tipo_produc"] .'</td>';
                        echo '<td>' . $contenido["precio"] .'</td>';
                        echo '<td>' . $contenido["cantidad_produc"] .'</td>';
                    
                    
                        echo "</tr>";
                    }
                    
                ?>
            </tr>
        </table>


    </div>
    
</body>
</html>