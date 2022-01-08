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
    $arrayCambios['newuser'] = $_POST['newuser'];
    $arrayCambios['newpassword'] = md5($_POST['newpassword']);
    $arrayCambios['newnombre'] = $_POST['newnombre'];

    $cambio = $objetoCambios->editarUsuario($id, $arrayCambios);
        if($cambio == true){
            echo "<script>alert('Se ha actualizado la información del Usuario,".'\n'.
            "deberá iniciar Sesión con sus nuevas credenciales!')</script>";
            header('Refresh:0 , url = logout.php');
            

        }else{
            echo "<script>alert('Error al actualizar Usuario')</script>";
            header("Refresh:0 , url = editarusuario.php");

        }
    }
?>