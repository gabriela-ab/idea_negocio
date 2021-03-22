<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Iniciar Sesion</title>
</head>
<body>

        <label class="logo"><img src="img/fondo1.jpg" height=50px width="50px" alt=""></label>
        
    <div  class="boxing">
        <form action="php/inicio.php" method="POST" autocomplete="off">
            <img class="logotipo " src="img/animalitos.jpg" alt="">
            <h1 class="login">LOGIN USER </h1>
            
            <input type="text" class="jhon" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
            <input type="password" class="jhon" id="clave" name="clave" placeholder="Ingrese su contraseña" required>
            <input type="submit" class="boto" id="boton" name="boton" value="Enviar" placeholder="Enviar">
            <a href="" class="contra">Olvido su contraseña</a>
            <a href="" class="contra">registrarse</a>
        </form>
        
    </div>
    
</body>
</html>