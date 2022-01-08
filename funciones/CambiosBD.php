<?php

require_once 'conexion.php';

class CambiosBD{

    public function insertarProducto($arrayproducto){

        $conexion = new conexion();
        $consulta = "INSERT INTO producto ";
        $consulta .= "(nombre, categoria, precio, existencia, foto) ";
        $consulta .= "VALUES (";
        $consulta .= "'" . $arrayproducto['producto'] . "',";
        $consulta .= "'" . $arrayproducto['categoria'] . "',";
        $consulta .= "'" . $arrayproducto['precio'] . "',";
        $consulta .= "'" . $arrayproducto['existencia'] . "',";
        $consulta .= "'" . $arrayproducto['foto'] . "'";
        $consulta .= ")";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;

    }

    public function editarProducto($id, $arrayCambios){
        $conexion = new conexion();
        $consulta = "UPDATE producto SET ";
        $consulta .= "nombre='" . $arrayCambios['producto'] . "', ";
        $consulta .= "categoria='" . $arrayCambios['categoria'] . "', ";
        $consulta .= "precio='" . $arrayCambios['precio'] . "', ";
        $consulta .= "existencia='" . $arrayCambios['existencia'] . "', ";
        $consulta .= "foto='" .$arrayCambios['foto'] . "' ";
        $consulta .= "WHERE idProducto='" . $id . "' ";
        $consulta .= "LIMIT 1";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;
    }

    public function eliminarProducto($id){
        $conexion = new conexion();
        $consulta = "DELETE FROM producto WHERE idProducto = '" . $id . "' ";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;
    }

    public function insertarCategoria($nuevacategoria){

        $conexion = new conexion();
        $consulta = "INSERT INTO categoria ";
        $consulta .= "(categoria) ";
        $consulta .= "VALUES (";
        $consulta .= "'" . $nuevacategoria['nuevacategoria'] . "'";
        $consulta .= ")";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;

    }

    public function editarCategoria($id, $arrayCambios){
        $conexion = new conexion();
        $consulta = "UPDATE categoria SET ";
        $consulta .= "categoria='" . $arrayCambios['categoria'] . "' ";
        $consulta .= "WHERE idCategoria='" . $id . "' ";
        $consulta .= "LIMIT 1";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;
    }

    public function eliminarCategoria ($id){
        $conexion = new conexion();
        $consulta = "DELETE FROM categoria WHERE idCategoria = '" . $id['categoria'] . "' ";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;
    }

    public function insertarUsuario($nuevoUsuario){

        $conexion = new conexion();
        $consulta = "INSERT INTO user ";
        $consulta .= "(`username`,`password`,`nombre`) ";
        $consulta .= "VALUES (";
        $consulta .= "'" . $nuevoUsuario['newusername'] . "',";
        $consulta .= "'" . $nuevoUsuario['newpassword'] . "',";
        $consulta .= "'" . $nuevoUsuario['newnombreempleado'] . "'";
        $consulta .= ")";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;

    }

    public function editarUsuario($id, $arrayCambios)
    {
        $conexion = new conexion();
        $consulta = "UPDATE user SET ";
        $consulta .= "username='" . $arrayCambios['newuser'] . "', ";
        $consulta .= "password='" . $arrayCambios['newpassword'] . "', ";
        $consulta .= "nombre='" . $arrayCambios['newnombre'] . "' ";
        $consulta .= "WHERE iduser='" . $id . "' ";
        $consulta .= "LIMIT 1";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;
    }

    public function eliminarUsuario($id)
    {
        $conexion = new conexion();
        $consulta = "DELETE FROM user WHERE iduser = '" . $id. "' ";
        $resultado = $conexion->ejecutar_consulta($consulta);

        return $resultado;
    }

}

?>