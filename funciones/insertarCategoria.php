<?php

session_start();
    require_once "conexion.php";
    /*Valida sesion iniciada*/
    /*if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }*/



require_once "CambiosBD.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $objetoCambios = new CambiosBD();
    $nuevacategoria = [];
    $nuevacategoria['nuevacategoria'] = $_POST['nuevacategoria'];
    $consulta = $objetoCambios->insertarCategoria($nuevacategoria);
    
    if($consulta == true){
        echo "<script>alert('Se ha agregado correctamente la Categoría')</script>";
        header('Refresh:0 , url = ../views/nuevoproducto.php');
    }else{
        echo "<script>alert('Error al agregar Categoría')</script>";
        header("Refresh:0 , url = ../tienda.php");

    }
}
?>