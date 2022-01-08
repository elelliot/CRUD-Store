<?php
    if(trim($_POST['username'])== null|| trim($_POST['password']) == null){
        echo "<script>alert('Por favor llena los campos correspondientes')</script>";
        header("Refresh:0 , url =  ../index.html");
        exit();

    }
    else{
        /*LA CONTRASEÑA se encripta con MD5 con la pagina de registro, 
        o podemos crearla directamente en la BDD usando el hash de la que queremos*/
         require_once "conexion.php";
         $objetoConexion = new conexion();
         $conn = $objetoConexion->conectar();
         $username = mysqli_real_escape_string($conn,$_POST['username']);
         $password = mysqli_real_escape_string($conn,md5($_POST['password']));
         $sql = "SELECT * FROM user WHERE username ='". $username ."' and password = '".$password."'";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_array($query , MYSQLI_ASSOC);
         if(!$result){
             echo "<script>alert('Credenciales Inválidas')</script>";
             header("Refresh:0 , url = logout.php");
             exit();

         }
         else{
             session_start();
             /*Una vez validada la sesión,
             cambiamos el valor del user y le asignamos el nombre de empleado a la variable global 
             para evitarnos un desastre xp */
             $_SESSION['username'] = $result['nombre'];

             header("Location: ../tienda.php");
             return $result;
             session_write_close();
         }
    }
    mysqli_close($conn);
?>