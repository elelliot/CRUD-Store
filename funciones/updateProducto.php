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
    
    /*Todo este mole es para validar la foto*/
    $status = $statusMsg = ''; 
    if(isset($_POST["submit"]))
    { 
        $status = 'error'; 
        if(!empty($_FILES["foto"]["name"])) 
        { 
            // Get file info 
            $fileName = basename($_FILES["foto"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg'); 
            if(in_array($fileType, $allowTypes))
            { 
                $image = $_FILES['foto']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            }else
                { 
                    $statusMsg = 'Solo se admiten los siguientes formatos para subir: JPG, JPEG & PNG.';
                    echo "<script> alert('".$statusMsg."'); </script>";
                } 
        }else
                { 
                    $statusMsg = 'Por favor, selecciona un archivo de imagen.';
                    echo "<script> alert('".$statusMsg."'); </script>";
                }
    } 
/*Terminamos de checar y asignar foto*/


    $objetoCambios = new CambiosBD();
    
    $arrayCambios = [];
    $arrayCambios['producto'] = $_POST['producto'];
    $arrayCambios['categoria'] = $_POST['categoria'];
    $arrayCambios['precio'] = $_POST['precio'];
    $arrayCambios['existencia'] = $_POST['existencia'];
    $arrayCambios['foto'] = $imgContent;

    $cambio = $objetoCambios->editarProducto($id, $arrayCambios);
        if($cambio == true){
            echo "<script>alert('Se ha actualizado el Producto correctamente!')</script>";
            header('Refresh:0 , url = ../tienda.php');
        }else{
            echo "<script>alert('Error al actualizar producto')</script>";
            header("Refresh:0 , url = ../tienda.php");

        }
    }
?>