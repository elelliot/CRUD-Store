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
$producto = "";


$objetoMenu = new menusDesplegables();
$listaProductos = $objetoMenu->generarListaProductos();//lista de Productos para desplegar en la edición de Productos

$listaCategorias = $objetoMenu->generarListaCategorias();

$objetoLista= new menusDesplegables();
//Agarramos el producto y despliega sus datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['producto'];
    $producto = $objetoLista->desplegarInfoProducto($id);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
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
        <a class="navegacion__enlace navegacion__enlace--activo" href="borrarproducto.php">Borrar Producto</a>
        <a class="navegacion__enlace" href="editarcategoria.php">Editar Categoría</a>
        <a class="navegacion__enlace" href="borrarcategoria.php">Borrar Categoría</a>
    </nav>

    <main class="contenedor">
    <!--Seleccionamos Producto-->
        <form class="formularioaltera" action="borrarproducto.php"  method="POST">
                    <fieldset>
                    <legend>Eliminar Producto</legend>
                    <div class="contenedorcat">
                        <div class="campo">
                            <label for="">Selecciona el producto a eliminar:</label>
                            <select class="input-text" name="producto">
                                <?php while ($row = mysqli_fetch_array($listaProductos)) { ?>
                                <option value="<?php echo $row['idProducto'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php } ?>
                            </select>    
                        </div>
                        <div class="alinear-centro flex">
                            <input class="botoncat w-sm-100" type="submit" name="submitcat" value="Continuar">
                        </div>
                    </div>
                    </fieldset>
                </form>


        <!--Desplegamos info de Producto-->
        <?php if ($producto != "") { ?>
        <form class="formularioprod" action="<?php echo '../funciones/deleteProducto.php?id='. $id?>" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Verifique la Información del Producto</legend>
                <?php while ($row = mysqli_fetch_array($producto)) { ?>
                <div class="contenedor-campos">
                    <div class="campo">
                        <label for="">Producto</label>
                        <input class="input-text" type="text" name="producto" value="<?php echo $row['nombre']; ?>" disabled>
                    </div>

                    <div class="campo">
                        <label for="">Categoria</label>
                        <select class="input-text" name="categoria" id="categoria" disabled>
                        <?php while ($row2 = mysqli_fetch_array($listaCategorias)) { ?>
                            <option value="<?php echo $row2['categoria'] ?>"><?php echo $row['categoria']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="">Precio</label>
                        <input class="input-text" type="number" name="precio" min=0 step="0.01" 
                        value="<?php echo $row['precio'] ?>" disabled>
                    </div>
                    
                    <div class="campo">
                        <label for="">Existencia</label>
                        <input class="input-text" type="number" name="existencia"  min=0 
                        value="<?php echo $row['existencia'] ?>" disabled>
                    </div>

                    <div class="campo">
                        <label for="">Foto del Producto</label>
                        <img class="producto__imagen" alt="imagen camisa"
                        src="data:foto/jpg;charset=utf8;base64,<?php echo base64_encode($row['foto']); ?>">
                    </div>

                </div><!--.contenedor-campos-->

                <div class="alinear-derecha flex">
                    <input class="boton w-sm-100" type="submit" name="submit" value="Eliminar Producto">
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