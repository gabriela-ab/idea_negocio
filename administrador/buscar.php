<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "veterinaria";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM inventario WHERE id_inventario NOT LIKE '' ORDER By cantidad_produc LIMIT 25";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM inventario,producto WHERE id_inventario LIKE '%$q%' OR producto.cod_produc LIKE '%$q%' OR cantidad_produc ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>codigo</td>
    					<td>nombres</td>
    					<td>cantidad</td>
    					<td></td>
    					
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['id_inventario']."</td>
    					<td>".$fila['cod_produc']."</td>
    					<td>".$fila['cantidad_produc']."</td>
    				
    					
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>