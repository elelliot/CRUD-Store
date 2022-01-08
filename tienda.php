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





/*Pa desplegar categorias en el selectbox*/
require_once "funciones/menusDesplegables.php";
$fila = 1;
$objetoMenu = new menusDesplegables();
$listaCategorias = $objetoMenu->generarListaCategorias();//listaC de Categorias para desplegar en la creacion de Productos


/*Pa desplegar productos*/

$filtro = "";
$listaGenerada = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['categoria'] == "todos"){
        $objetolista = new menusDesplegables();
        $listaGenerada = $objetolista->verProductosIndex();
    }
    else{
        $filtro = $_POST['categoria'];
        $objetolista = new menusDesplegables();
        $listaGenerada = $objetolista->filtrarProductosIndex($filtro);
    } 
}
else{
    /*SE DESPLIEGAN TODOS LOS ARTICULOS DESDE ANTES DE FILTRAR OSEA CUANDO CARGA LA PAGINA*/
    $objetolista = new menusDesplegables();
    $listaGenerada = $objetolista->verProductosIndex();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa</title>
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="preload" href="css/styles.css" as="style">
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
        <a class="navegacion__enlace navegacion__enlace--activo"  href="tienda.php">Tienda</a>
        <a class="navegacion__enlace" href="nosotros.php">Nosotros</a>

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
        <h1>Nuestros Productos</h1>

        <!--Seleccion de Categorias-->
        <form action="tienda.php" method="POST" >
        <div class="searchcat">
            <label for="">Filtrar por Categoria: </label><br>
            <select class="select-cat" name="categoria" id="categoria">
                    <option value="todos">Todos</option>
                    <?php while ($row = mysqli_fetch_array($listaCategorias)) { ?>
                    <option value="<?php echo $row['categoria'] ?>"><?php echo $row['categoria'] ?></option>
                    <?php } ?>
            </select>
        <input class="boton w-sm-100" type="submit" name="submit" value="Buscar">
        </div>
        </form>

        <!--Grid de Productos-->
        <div class="grid">
            <!--Vamos a usar un while para agarrar todos los registros de camisetas y mostrarlos en el grid-->
            <?php while ($row = mysqli_fetch_array($listaGenerada)) { ?>

                <div class="producto">
                    <a href="#">
                            <img class="producto__imagen" alt="imagen camisa" src="data:foto/jpg;charset=utf8;base64,<?php echo base64_encode($row['foto']); ?>">
                        <div class="producto__informacion">
                            <p class="producto__nombre"><?php echo $row['nombre'] ?></p>
                            <p class="producto__precio">$<?php echo $row['precio'] ?></p>
                        </div>
                    </a>
                </div> <!--.producto-->
            <?php } ?>

            <div class="grafico grafico--camisas"></div>
            <div class="grafico grafico--node"></div>
        </div>

        

    </main>

    <footer class="footer">
        <p class="footer__texto">Management</p>
    </footer>
</body>
</html>