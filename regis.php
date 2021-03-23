<?php

require_once('conexion/conexion.php');
?>
<?php
    $sql1 = "SELECT * FROM tipo_documento";
    $query1 = mysqli_query($conexion,$sql1);
    $fila1 = mysqli_fetch_assoc($query1);
?>
<?php
    $sql2 = "SELECT * FROM tipo_usuario WHERE id_tip_usu >= 2";
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

    <div class="formulario">
        <form action="php/registro.php" method="POST" autocomplete="off">
            <img src="img/veterinario.png" alt="">
            <h1 class="titulo">Registrarse</h1>
            <div class="regis">
                <select name="tipo_docu" id="tipo_docu" required>
                    <option value="">Elije tipo documento</option>
                    <?php

                        foreach ($query1 as $tip_docu) : ?>

                    <option value="<?php echo $tip_docu['id_tip_docu'] ?> ">
                        <?php echo $tip_docu['tipo_documento'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="number" name="documento" id="documento" class="docu" placeholder="Digite su documento" required>
                <input type="text" name="nombres" id="nombres" placeholder="Digite su nombres" required>
                <input type="text" name="apellidos" id="apellidos" placeholder="Digite su apellidos" required>
                <input type="text" name="usuario" id="usuario" placeholder="Digite su usuario" required>
                <input type="number" name="clave" id="clave" placeholder="Digite su contraseña" required>
                <input type="number" name="telefono" id="telefono" placeholder="Digite su telefono" required>
                <input type="email" name="email" id="email" placeholder="Digite su email" required>
                
                <select name="tipo_usu" id="tipo_usu" required>
                    <option value="">Elije tipo usuario</option>
                    <?php

                        foreach ($query2 as $tip_usu) : ?>

                    <option value="<?php echo $tip_usu['id_tip_usu'] ?> ">
                        <?php echo $tip_usu['tipo_usuario'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="submit" class="enviar" name="enviar" Value="Registrar" id="enviar">
            </div>
            

        </form>
    </div>
</body>
</html>