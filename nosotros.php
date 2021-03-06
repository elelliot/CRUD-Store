<?php
//Confirmando sesion iniciada
session_start();
require_once "funciones/conexion.php";
/*En caso de no loguearse, te regresa al login*/
if ($_SESSION['username'] == null) {
    echo "<script>alert('Por favor, introduzca credenciales para acceder.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
/*Agarramos el nombre de empleado para mostrarlo en el mensaje de bienvenida*/
$nombreempleado = $_SESSION['username'];

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">


</head>
<body>
    <header class="header">
        <a href="tienda.php">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>

        <legend class="welcome">Bienvenido: <?php echo $str = strtoupper($nombreempleado) ?></legend>

        <a class="boton-logout w-sm-100" href="funciones/logout.php" role="button">Cerrar Sesión</a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace "  href="tienda.php">Tienda</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="nosotros.php">Nosotros</a>

        <a class="navegacion__enlace" href="views/editarusuario.php">Editar Usuario</a>
        <a class="navegacion__enlace" href="views/borrarusuario.php">Borrar Usuario</a>
        
    </nav>

    <nav class="navegacion">
        <a class="navegacion__enlace" href="views/nuevoproducto.php">Agregar Nuevo Producto/Categoría</a>
        <a class="navegacion__enlace" href="views/editarproducto.php">Editar Producto</a>
        <a class="navegacion__enlace" href="views/borrarproducto.php">Borrar Producto</a>
        <a class="navegacion__enlace" href="views/editarcategoria.php">Editar Categoría</a>
        <a class="navegacion__enlace" href="views/borrarcategoria.php">Borrar Categoría</a>
    </nav>

    <main class="contenedorprod">
        <h1>Nosotros</h1>

        <div class="nosotros">
            <div class="nosotros__contenido">
                    <p>Vestibulum a elementum nisi, sed fermentum massa. Aenean ut mattis turpis, nec maximus arcu. 
                    Nam quis aliquam nunc, vel placerat elit. Nam vitae nisi nulla. Phasellus at nisi orci.
                    Praesent viverra, tortor ut bibendum iaculis, neque quam sagittis nulla, sit amet consectetur tellus enim vel urna. 
                    Sed sit amet sagittis ex. Etiam aliquet nunc ex, ut dignissim sapien malesuada eu. Etiam imperdiet commodo pretium. 
                    Proin lacinia accumsan sollicitudin.</p>
                    
                    <p>Donec leo mauris, tristique vel libero quis, consectetur accumsan tortor. 
                    Donec nisi nisl, congue sed nibh a, vehicula iaculis velit.
                    Donec eleifend erat et ligula fringilla, et maximus mauris sodales. 
                    Cras turpis turpis, lobortis ut erat rhoncus, finibus sodales nunc.</p> 
            </div>
            <img class="nosotros__imagen" src="img/nosotros.jpg" alt="imagen nosotros">
        </div>

        
        
    </main>

    <section class="contenedorprod comprar">
        <h2>Porqué comprar con nosotros</h2>

        <div class="bloques">        
            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_1.png" alt="por que comprar">
                <h3 class="bloque__titulo">El Mejor Precio</h3>
                <p>estibulum a elementum nisi, sed fermentum massa. Aenean ut mattis turpis, nec maximus arcu. 
                Nam quis aliquam nunc, vel placerat elit.</p>
            </div><!--.bloque-->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_2.png" alt="por que comprar">
                <h3 class="bloque__titulo">Para Devs</h3>
                <p>estibulum a elementum nisi, sed fermentum massa. Aenean ut mattis turpis, nec maximus arcu. 
                Nam quis aliquam nunc, vel placerat elit.</p>
            </div><!--.bloque-->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_3.png" alt="por que comprar">
                <h3 class="bloque__titulo">Envío Gratis</h3>
                <p>estibulum a elementum nisi, sed fermentum massa. Aenean ut mattis turpis, nec maximus arcu. 
                Nam quis aliquam nunc, vel placerat elit.</p>
            </div><!--.bloque-->

            <div class="bloque">
                <img class="bloque__imagen" src="img/icono_4.png" alt="por que comprar">
                <h3 class="bloque__titulo">La Mejor Calidad</h3>
                <p>estibulum a elementum nisi, sed fermentum massa. Aenean ut mattis turpis, nec maximus arcu. 
                Nam quis aliquam nunc, vel placerat elit.</p>
            </div><!--.bloque-->
        </div><!--.bloques-->
    </section>

    <footer class="footer">
        <p class="footer__texto">Management</p>
    </footer>
</body>
</html>