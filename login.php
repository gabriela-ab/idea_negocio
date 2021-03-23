<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Iniciar Sesion</title>
</head>
<body>
        
    <div  class="boxing">
        <form action="php/inicio.php" method="POST" autocomplete="off">
            <img class="logotipo " src="img/veterinario.png" alt="">
            <h1 class="login">Iniciar Sesion</h1>
            
            <input type="text" class="jhon" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
            <input type="password" class="jhon" id="clave" name="clave" placeholder="Ingrese su contraseña" required>
            <input type="submit" class="boto" id="boton" name="boton" value="Enviar">
            <a href="regis.php" class="contra">Registrarse</a>
        </form>
        
    </div>
    
</body>
</html>