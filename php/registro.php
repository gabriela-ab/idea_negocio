<?php
    require_once('../conexion/conexion.php');

    if(isset($_POST["enviar"])){
        $tip_docu=$_POST['tipo_docu'];
        $docuemnto=$_POST['documento'];
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $tipo_usu=$_POST['tipo_usu'];

        $comprobar = "SELECT * FROM usuario WHERE documento='$docuemnto'";
        $consulta = mysqli_query($conexion, $comprobar);
        $fila = mysqli_fetch_assoc($consulta);

        if($fila){
            echo "<script> alert('Usuario activo, cambie los datos')</script>";
            echo '<script> window.location="../regis.php"</script>';
        }
        else{
            $registrar = "INSERT INTO usuario (documento, nombres, apellidos, usuario, clave, telefono, email, id_tip_docu, id_tip_usu)
            VALUES('$docuemnto','$nombres','$apellidos','$usuario','$clave','$telefono','$email','$tip_docu','$tipo_usu')";
            $validar = mysqli_query($conexion,$registrar);
            echo "<script> alert('Se guardaron los datos exitosamente.')</script>";
            echo '<script> window.location="../login.php" </script>';
        }
    }
?>
