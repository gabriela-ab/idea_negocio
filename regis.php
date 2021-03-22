<?php

require_once('conexion/conexion.php');
?>
<?php
    $sql1 = "SELECT * FROM tipo_documento";
    $query1 = mysqli_query($conexion,$sql1);
    $fila1 = mysqli_fetch_assoc($query1);
?>
<?php
    $sql2 = "SELECT * FROM tipo_usuario";
    $query2 = mysqli_query($conexion,$sql2);
    $fila2 = mysqli_fetch_assoc($query2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/regis.css">
</head>
<body>

    <div>
        <form action="php/registro.php" method="post">
            <img src="img/veterinario.png" alt="">
            <h1 class="login">Registrarse</h1>
            <select name="tipo_docu" id="tipo_docu" required>
                <option value="">Elije Tipo Documento</option>
                <?php

                    foreach ($query1 as $tip_docu) : ?>

                <option value="<?php echo $tip_docu['id_tip_docu'] ?> ">
                    <?php echo $tip_docu['tipo_documento'] ?></option>
                <?php
                endforeach;
                ?>
            </select>
            <input type="text" name="documento" id="documento" placeholder="Digite su Documento" required>
            <input type="text" name="nombres" id="nombres" placeholder="Digite su Nombres" required>
            <input type="text" name="apellidos" id="apellidos" placeholder="Digite su Apellidos" required>
            <input type="text" name="usuario" id="usuario" placeholder="Digite su Usuario" required>
            <input type="text" name="clave" id="clave" placeholder="Digite su Contraseña" required>
            <input type="text" name="telefono" id="telefono" placeholder="Digite su Telefono" required>
            <input type="text" name="email" id="email" placeholder="Digite su Email" required>
            
            <select name="tipo_usu" id="tipo_usu" required>
                <option value="">Elije Tipo Usuario</option>
                <?php

                    foreach ($query2 as $tip_usu) : ?>

                <option value="<?php echo $tip_usu['id_tip_usu'] ?> ">
                    <?php echo $tip_usu['tipo_usuario'] ?></option>
                <?php
                endforeach;
                ?>
            </select>
            <input type="submit" name="enviar" Value="Registrar" id="enviar">

        </form>
    </div>
</body>
</html>