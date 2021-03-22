<?php
session_start();
require_once("conexion.php");
if($_POST["boton"]){


    $usuario = $_POST["usuario"];
    $_password =$_POST ["clave"];

    $con = "select * from usuario where usuario = '$usuario' and clave = '$_password'";
    $query = mysqli_query($mysqli,$con);
    $fila = (mysqli_fetch_assoc($query));
    if($fila)
    {

            $_SESSION['tip_usu'] = $fila['id_tip_usu'];
            $_SESSION['documento'] = $fila['documento'];
            $_SESSION['nombres'] = $fila['nombres'];
            $_SESSION['apellidos'] = $fila['apellidos'];
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['clave'] = $fila['clave'];


        if($_SESSION['tip_usu'] == 1){
            header ("location:administrador.php");
            exit();
        }elseif($_SESSION['tip_usu'] == 2)
        {
            header ("location:usuario.php");
            exit();
        }
    }else 
    {
        echo('no se pudo conectar');
        exit();

    }
}
?>