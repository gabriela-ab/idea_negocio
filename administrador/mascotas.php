<?php
require_once('../conexion/conexion.php');

    $sql="SELECT * FROM mascota, tipo_mascota, genero, raza, tiempo, usuario WHERE mascota.id_tip_mascota = tipo_mascota.id_tip_mascota and 
    mascota.id_genero = genero.id_genero and mascota.documento = usuario.documento and mascota.id_raza = raza.id_raza and mascota.id_tiempo = tiempo.id_tiempo";
    $query = mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>control de Mascotas</title>
    <link rel="stylesheet" href="../css/tabla.css">
</head>
<body>
    <div class="tabla">
        <table class="mascotas">
        <tr>
            <td class="principal">Codigo</td>
            <td class="principal">Nombre mascota</td>
            <td class="principal">Tipo mascota</td>
            <td class="principal">Raza</td>
            <td class="principal">Edad</td>
            <td class="principal">Genero</td>
            <td class="principal">Dueño de mascota</td>
        </tr>

        <tr>
            <?php
                foreach ($query as $contenido){
                    $codigo = $contenido["codigo"];
                    echo "<tr>";
                    echo '<td>' . $contenido["codigo"] .'</td>';
                    echo '<td>' . $contenido["nombre"] .'</td>';
                    echo '<td>' . $contenido["tipo_mascota"] .'</td>';
                    echo '<td>' . $contenido["non_raza"] .'</td>';
                    echo '<td>' . $contenido["nom_tiempo"] .'</td>';
                    echo '<td>' . $contenido["genero"] .'</td>';
                    echo '<td>' . $contenido["nombres"] .'</td>';
                    echo '<td>' . "<a href='control.php?codigo=$codigo'>" . "<p> <b> Realizar control </b> </p>" . '</a>' . '</td>';
                    echo "</tr>";
                }
                
            ?>
        </tr>


        </table>
    </div>
    
</body>
</html>