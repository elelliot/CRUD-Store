<?php

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
    <header class="headerCliente">
        <a href="./index.html">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>
        
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace navegacion__enlace--activo"  href="tiendaClientView.php">Tienda</a>
        <a class="navegacion__enlace" href="nosotrosClientView.php">Nosotros</a>
        
    </nav>

    

    <main class="contenedorprod">
        <h1>Nuestros Productos</h1>

        <!--Seleccion de Categorias-->
        <form action="tiendaClientView.php" method="POST" >
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