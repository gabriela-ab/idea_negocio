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

<?php
    $consulta = "SELECT * FROM producto, marca, tipo_producto, cantidad_pructo WHERE producto.id_marca = marca.id_marca and producto.id_tip_produc = tipo_producto.id_tip_produc
    and producto.id_cantidad_produc = cantidad_pructo.id_cantidad_produc";
    $query_tod = mysqli_query($conexion,$consulta);
    $fila_tod = mysqli_fetch_assoc($query_tod);
?>

<?php
    $consulta_compra = "SELECT * FROM compras, mascota, usuario, producto, cantidad_pructo WHERE compras.codigo = mascota.codigo and compras.cod_produc = producto.cod_produc and compras.id_cantidad_produc = cantidad_pructo.id_cantidad_produc 
    and mascota.documento = usuario.documento";
    $query_com = mysqli_query($conexion,$consulta_compra);
    $fila_com = mysqli_fetch_assoc($query_com);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/inventario.css">
</head>
<body>
    <div class="tabla">
        <h1 class="titulo-pro">Productos</h1>
        <table class="productos">
            <tr>
                <td class="principal"><b>Producto</b></td>
                <td class="principal"><b>Marca</b></td>
                <td class="principal"><b>Tipo producto</b></td>
                <td class="principal"><b>Cantidad</b></td>
                <td class="principal"><b>Precio</b></td>
                
                
            </tr>
            <tr>
                <?php
                    foreach ($query_tod as $contenido){
                        echo "<tr>";
                        echo '<td>' . $contenido["nom_produc"] .'</td>';
                        echo '<td>' . $contenido["nom_marca"] .'</td>';
                        echo '<td>' . $contenido["tipo_produc"] .'</td>';
                        echo '<td>' . $contenido["cantidad"] .'</td>';
                        echo '<td>' . $contenido["precio"] .'</td>';
                    
                    
                        echo "</tr>";
                    }
                    
                ?>
            </tr>
        </table>
    </div>

    <div class="tabla_pro">
        <h1 class="titulo-com">Compras realizadas</h1>
        <table class="compras">
            <tr>
                <td class="principal"><b>Cliente</b></td>
                <td class="principal"><b>Cual mascota</b></td>
                <td class="principal"><b>producto</b></td>
                <td class="principal"><b>Cantidad</b></td>
               
                
                
            </tr>
            <tr>
                <?php
                    foreach ($query_com as $compras){
                        echo "<tr>";
                        echo '<td>' . $compras["nombres"], $compras["apellidos"] .'</td>';
                        echo '<td>' . $compras["nombre"] .'</td>';
                        echo '<td>' . $compras["nom_produc"] .'</td>';
                        echo '<td>' . $compras["cantidad"] .'</td>';
                    
                        echo "</tr>";
                    }
                    
                ?>
            </tr>
        </table>


    </div>
    
</body>
</html>