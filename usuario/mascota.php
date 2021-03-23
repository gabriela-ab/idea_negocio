<?php
require_once('../conexion/conexion.php');

?>
<?php

    $sqlmas = "SELECT * FROM tipo_mascota";
    $querymas = mysqli_query($conexion,$sqlmas);
    $filamas = mysqli_fetch_assoc($querymas);
?>

<?php

    $sqlge = "SELECT * FROM genero";
    $queryge = mysqli_query($conexion,$sqlge);
    $filage = mysqli_fetch_assoc($queryge);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascota</title>
    <link rel="stylesheet" href="../css/mascota.css">
</head>
<body>

    <div class="formulario">
        <form action="regis-mas.php" method="POST" autocomplete="off">
            <h1 class="titulo">Registrar mascota</h1>
            <div class="regis">
                <input type="number" name="codigo" id="codigo" placeholder="Digita codigo mascota" required>
                <input type="text" name="nombre" id="nombre" placeholder="Digita el nombre" required>
                <select class="mascota" name="tipo_mas" id="tipo_mas" required>
                    <option value="">Elije tipo mascota</option>
                    <?php

                        foreach ($querymas as $tip_mas) : ?>

                    <option value="<?php echo $tip_mas['id_tip_mascota'] ?> ">
                        <?php echo $tip_mas['tipo_mascota'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="text" name="raza" id="raza" placeholder="Digita la raza" required>
                <input type="text" name="edad" id="edad" placeholder="Digita la edad" required>
                <select name="genero" id="genero" required>
                    <option value="">Elije genero</option>
                    <?php

                        foreach ($queryge as $genero) : ?>

                    <option value="<?php echo $genero['id_genero'] ?> ">
                        <?php echo $genero['genero'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <input type="text" name="documento" id="documento" placeholder="Digita documento del dueño" required>
                <input type="submit" class="enviar" name="registrar" id="registrar" value="Registrar">
                
            </div>
            
        </form>
    </div>
    
</body>
</html>
