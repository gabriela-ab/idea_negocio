<?php


//extraer el dia y el mes de la fecha actual
$ahora = time();
$limite = strtotime($ahora);

$a = date("m",$ahora);
$d = date("d",$ahora);



echo ($a);
echo '<hr />';
echo ($d);
echo '<hr />';


    //a la fecha actual sumarle 10 dias e imprimirla
    $ahora = time();

    $limite = strtotime("+10 day", $ahora);
    $limite_spa = date("Y-m-d H:i:s", $limite);
    //$tiempo = date("d",$ahora);
    //$fecha = strtotime("+10 day", $tiempo);
    $dia = date("d",$limite);
    echo ($dia);
    echo '<hr />';
     if($ahora >= $dia){
        echo "<script> alert('$dia,$limite_spa, !!HACER CONTROL¡¡')</script>";
       

    }else echo "<script> alert('$ahora, ')</script>";