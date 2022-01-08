<?php

//Confirmando sesion iniciada
session_start();
require_once "../funciones/conexion.php";
/*En caso de no loguearse, te regresa al login*/
if ($_SESSION['username'] == null) {
    echo "<script>alert('Por favor, introduzca credenciales para acceder.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
/*Agarramos el nombre de empleado para mostrarlo en el mensaje de bienvenida*/
$nombreempleado = $_SESSION['username'];





require_once "../funciones/menusDesplegables.php";


$id = "";
$usuario = "";


$objetoMenu = new menusDesplegables();
$listaUsuarios = $objetoMenu->generarListaUsuarios();//lista de Users para desplegar en la edición de Users

$objetoLista= new menusDesplegables();
//Agarramos el producto y despliega sus datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['user'];//Lo Agarro del Select
    $usuario = $objetoLista->desplegarInfoUsuario($id);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    
    
    <link rel="preload" href="../css/styles.css" as="style"> 
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <header class="header">
        <a href="../tienda.php">
            <img class="header__logo" src="../img/logo.png" alt="Logotipo">
        </a>

        <legend class="welcome">Bienvenido: <?php echo $str = strtoupper($nombreempleado) ?></legend>

        <a class="boton-logout w-sm-100" href="../funciones/logout.php" role="button">Cerrar Sesión</a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace "  href="../tienda.php">Tienda</a>
        <a class="navegacion__enlace" href="../nosotros.php">Nosotros</a>

        <a class="navegacion__enlace " href="editarusuario.php">Editar Usuario</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="borrarusuario.php">Borrar Usuario</a>
        
    </nav>

    <nav class="navegacion">
        <a class="navegacion__enlace" href="nuevoproducto.php">Agregar Nuevo Producto/Categoría</a>
        <a class="navegacion__enlace" href="editarproducto.php">Editar Producto</a>
        <a class="navegacion__enlace" href="borrarproducto.php">Borrar Producto</a>
        <a class="navegacion__enlace" href="editarcategoria.php">Editar Categoría</a>
        <a class="navegacion__enlace" href="borrarcategoria.php">Borrar Categoría</a>
    </nav>

    <main class="contenedor">
    <!--Seleccionamos Usuario-->
        <form class="formularioaltera" action="borrarusuario.php"  method="POST">
                    <fieldset>
                    <div class="contenedorcat">
                        <div class="campo">
                            <label for="">Selecciona el usuario a eliminar:</label>
                            <select class="input-text" name="user">
                                <?php while ($row = mysqli_fetch_array($listaUsuarios)) { ?>
                                <option value="<?php echo $row['iduser'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php } ?>
                            </select>    
                        </div>
                        <div class="alinear-centro flex">
                            <input class="botoncat w-sm-100" type="submit" name="submitcat" value="Continuar">
                        </div>
                    </div>
                    </fieldset>
                </form>


        <!--Desplegamos info de Usuario-->
        <?php if ($usuario != "") { ?>
        <form class="formularioprod" action="<?php echo '../funciones/deleteUsuario.php?id='. $id?>" method="POST">
            <fieldset>
                <legend>Verifique la Información de Usuario antes de eliminarla</legend>
                <?php while ($row = mysqli_fetch_array($usuario)) { ?>
                <div class="contenedor-campos">
                    <div class="campo">
                        <label for="">UserName</label>
                        <input class="input-text" type="text" name="user" value="<?php echo $row['username']; ?>" required disabled>
                    </div>

                    <div class="campo">
                        <label for="">Nombre de Empleado</label>
                        <input class="input-text" type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required disabled>
                    </div>

                </div><!--.contenedor-campos-->

                <div class="alinear-centro flex">
                    <input class="boton w-sm-100" type="submit" name="submit" value="Eliminar!">
                </div>
                <?php } ?>
                
            </fieldset>
            
        </form>
        <?php } else {?>
            <?php } ?>
        
    </main>

    <footer class="footer">
        <p class="footer__texto">Management</p>
    </footer>
</body>
</html>