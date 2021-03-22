<?php

require_once("../conexion/conexion.php");
if($_POST["boton"]){


    $usuario = $_POST["usuario"];
    $password =$_POST ["clave"];

    $con = "SELECT * from usuario where usuario = '$usuario' and clave = '$password'";
    $query = mysqli_query($conexion,$con);
    $fila = mysqli_fetch_assoc($query);
    if($fila)
    {

            $_SESSION['tip_usu'] = $fila['id_tip_usu'];
            $_SESSION['documento'] = $fila['documento'];
            $_SESSION['nombres'] = $fila['nombres'];
            $_SESSION['apellidos'] = $fila['apellidos'];
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['clave'] = $fila['clave'];
            $_SESSION['telefono'] = $fila['telefono'];
            $_SESSION['email'] = $fila['email'];
            $_SESSION['tipo_docu'] = $fila['id_tip_docu'];


        if($_SESSION['tip_usu'] == 1){
        
            header("location: ../administrador/administrador.php");
            exit();
        }
        if($_SESSION['tip_usu'] == 2){
            header("location: ../usuario/usuario.php");
            exit();
        }
    }
    else{
        echo "<script> alert('Este usuario NO se encuentra registrado.')</script>";
        echo '<script> window.location="../login.php" </script>'; 

    }
}
?>