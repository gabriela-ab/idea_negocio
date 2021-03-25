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

    $query = "SELECT * FROM usuario WHERE documento NOT LIKE '' ORDER By nombres ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM usuario,tipo_documento,tipo_usuario WHERE documento LIKE '%$q%' OR nombres LIKE '%$q%' OR apellidos LIKE '%$q%' OR usuario LIKE '%$q%' OR clave LIKE '%$q%' OR telefono LIKE '%$q%' OR email LIKE '%$q%' OR  usuario.id_tip_docu = tipo_documento.id_tip_docu LIKE '%$q%'
       OR usuario.id_tip_usu = tipo_usuario.id_tip_usu LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>codigo</td>
    					<td>nombres</td>
    					<td>cantidad</td>
    					<td>usuario</td>
              <td>clave</td>
              <td>telefono</td>
              <td>email</td>
              <td>tipo de documento</td>
              <td>tpo de usuario</td>
    					
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['documento']."</td>
    					<td>".$fila['nombres']."</td>
    					<td>".$fila['apellidos']."</td>
              <td>".$fila['usuario']."</td>
              <td>".$fila['clave']."</td>
              <td>".$fila['telefono']."</td>
              <td>".$fila['email']."</td>
              <td>".$fila['id_tip_docu']."</td>
              <td>".$fila['id_tip_usu']."</td>
              
    					
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>