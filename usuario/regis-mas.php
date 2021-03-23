<?php
    require_once('../conexion/conexion.php');
    
    if(isset($_POST['registrar'])){
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $tipo_mascota=$_POST['tipo_mas'];
        $raza=$_POST['raza'];
        $edad=$_POST['edad'];
        $genero=$_POST['genero'];
        $documento=$_POST['documento'];

        $comprobar = "SELECT * FROM mascota WHERE codigo='$codigo'";
        $consulta = mysqli_query($conexion, $comprobar);
        $fila = mysqli_fetch_assoc($consulta);

        if($fila){
            echo "<script> alert('El codigo ingresado de la mascota ya se encuntra')</script>";
            echo '<script> window.location="usuario.php"</script>';
        }
        else{
            $registrar = "INSERT INTO mascota (codigo, nombre, id_tip_mascota, raza, edad, id_genero, documento)
            VALUES('$codigo','$nombre','$tipo_mascota','$raza','$edad','$genero','$documento')";
            $validar = mysqli_query($conexion,$registrar);
            echo "<script> alert('Se guardaron los datos exitosamente.')</script>";
            echo '<script> window.location="usuario.php" </script>';
        }
    }
    
?>