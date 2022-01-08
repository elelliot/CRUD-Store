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

//Desplegamos la lista de categorias
$objetoMenu = new menusDesplegables();
$listaCategorias = $objetoMenu->generarListaCategorias();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
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
        <a class="navegacion__enlace" href="borrarusuario.php">Borrar Usuario</a>
        
    </nav>

    <nav class="navegacion">
        <a class="navegacion__enlace" href="nuevoproducto.php">Agregar Nuevo Producto/Categoría</a>
        <a class="navegacion__enlace" href="editarproducto.php">Editar Producto</a>
        <a class="navegacion__enlace" href="borrarproducto.php">Borrar Producto</a>
        <a class="navegacion__enlace" href="editarcategoria.php">Editar Categoría</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="borrarcategoria.php">Borrar Categoría</a>
    </nav>

    <main class="contenedoralt">
    <!--Seleccionamos Categoría-->
        <form class="formularioaltera" action="../funciones/deleteCategoria.php"  method="POST">
                <fieldset>
                    <legend>¿Cual Categoría eliminará?</legend>
                    <div class="contenedorcat">
                        <div class="campo">
                                <select class="input-text" name="categoria">
                                <?php while ($row = mysqli_fetch_array($listaCategorias)) { ?>
                                <option value="<?php echo $row['idCategoria'] ?>"><?php echo $row['categoria'] ?></option>
                            <?php } ?>
                                </select>
                        </div> <!--contenedorcat-->

                        <div class="alinear-centro flex">
                            <input class="botoncat w-sm-100" type="submit" name="submitcat" value="Eliminar">
                        </div>
                    </div>
                </fieldset>
        </form>


    </main>

    <footer class="footer">
        <p class="footer__texto">Management</p>
    </footer>
</body>
</html>