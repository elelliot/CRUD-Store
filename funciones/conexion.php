<?php

//require_once 'server.php';


const SERVER = "localhost";
const DB = "tienda";
const USER = "root";
const PASS = "";
class conexion{

    
    //metodo para conectarse a base de datos   

    public static function conectar(){
        $conn = new mysqli(SERVER , USER, PASS, DB);
        mysqli_query($conn , "SET character_set_result=utf8");
        if($conn->connect_error){
            die("Database Error : " . $conn->connect_error);
        }
        return $conn;
    }

    public function ejecutar_consulta($consulta){
        $conn = self::conectar();
        $resultado = mysqli_query($conn, $consulta);
        $conn->close();
        return $resultado;
    }
}
?>