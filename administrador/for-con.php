<?php
require_once('../conexion/conexion.php');

if(isset($_POST["enviar"])){
    $id_control=$_POST['cod_control'];
    $control=$_POST['tipo_control'];
    $codigo=$_POST['codigo_dog'];
    $descripcion=$_POST['descripcion'];
    $peso=$_POST['peso'];
    $altura=$_POST['altura'];
    $observaciones=$_POST['observaciones'];

    $ahora = time();
    $limite = strtotime("+10 day", $ahora);
    $limite_spa = date("Y-m-d H:i:s", $limite);

    $comprobar = "SELECT * FROM control WHERE id_control='$id_control'";
    $consulta = mysqli_query($conexion, $comprobar);
    $fila = mysqli_fetch_assoc($consulta);

    if($fila){
        echo "<script> alert('Ya se le realizo el control a la mascota')</script>";
        echo '<script> window.location="../regis.php"</script>';
    }
    else{
        $registrar = "INSERT INTO control (id_control, id_tip_control, codigo, descripcion, peso, altura, proxima_fecha, observaciones)
        VALUES('$id_control','$control','$codigo','$descripcion','$peso','$altura','$limite_spa','$observaciones')";
        $validar = mysqli_query($conexion,$registrar);
        echo "<script> alert('Se guardaron los datos exitosamente.')</script>";
        echo '<script> window.location="administrador.php" </script>';
    }

}

?>