<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="preload" href="css/styles.css" as="style">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class = "content">
        <h1 class="titulo">Registrar nuevo usuario</h1>
        <form action="../funciones/insertarUsuario.php" method="POST">
            <label for="nombreuser">Nombre de Empleado: </label>
            <br>
            <input class="usercamp" type="text" name="newnombreempleado" placeholder="Ingresa tu nombre :" required>
            <br>
            <label for="username">Usuario: </label>
            <br>
            <input class="usercamp" type="text" name="newusername" placeholder="Ingresa tu usuario :" required>
            <br>
            <label for="pass">Contraseña: </label>
            <br>
            <input class="passcamp" type="password" name="newpassword" placeholder="Ingresa tu contraseña :" required>
            <br>
            <input class="login" type="submit" value="Registrar">

            <h4 class="yatienescuenta">¿Ya tienes cuenta?</h4>
            <a href="../index.html" class="entra">Ingresa</a>
        </form>
            
    </div>
</body>
</html>