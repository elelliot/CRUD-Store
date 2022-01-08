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
    $nuevoUsuario = [];
    $nuevoUsuario['newusername'] = $_POST['newusername'];
    $nuevoUsuario['newpassword'] = md5($_POST['newpassword']);
    $nuevoUsuario['newnombreempleado'] = $_POST['newnombreempleado'];

    $consulta = $objetoCambios->insertarUsuario($nuevoUsuario);
    
    if($consulta == true){
        echo "<script>alert('Se ha agregado correctamente al Usuario')</script>";
        header('Refresh:0 , url = ../index.html');
    }else{
        echo "<script>alert('Error al agregar Usuario')</script>";
        header("Refresh:0 , url = ../index.html");

    }
}
?>