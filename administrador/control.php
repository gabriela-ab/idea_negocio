<?php
require_once('../conexion/conexion.php');

?>
<?php
    $sqlcon = "SELECT * FROM tipo_control";
    $quercon = mysqli_query($conexion,$sqlcon);
    $filacon = mysqli_fetch_assoc($querycon);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controles</title>
</head>
<body>
    <div class="formul">
        <form action="" method="POST">
            <select name="tipo_docu" id="tipo_docu" required>
                <option value="">Elije tipo documento</option>
                <?php

                    foreach ($querycon as $tip_con) : ?>

                <option value="<?php echo $tip_con['id_tip_control'] ?> ">
                    <?php echo $tip_con['tipo_control'] ?></option>
                <?php
                endforeach;
                ?>
            </select>

            <input type="text" name="control">
        </form>
    </div>
    
</body>
</html>
