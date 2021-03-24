<?php
$ahora = time();
$limite = strtotime("+10 day", $ahora);

$ahora_spa = date("d-m-Y H:i:s", $ahora);
$limite_spa = date("d-m-Y H:i:s", $limite);

echo ' '.$ahora_spa;
echo '<hr />';
echo ' '.$limite_spa;
?>