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


$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    


    $objetoCambios = new CambiosBD();

    $arrayCambios = [];
    $arrayCambios['categoria'] = $_POST['categoria'];

    $cambio = $objetoCambios->editarCategoria($id, $arrayCambios);
        if($cambio == true){
            echo "<script>alert('Se ha actualizado la Categoría')</script>";
            header('Refresh:0 , url = ../tienda.php');
        }else{
            echo "<script>alert('Error al actualizar Categoría')</script>";
            header("Refresh:0 , url = ../tienda.php");

        }
    }
?>