<?php

require_once "conexion.php";

class menusDesplegables
{

    //VISUALIZAR LOS DATOS DONDE SEA MENOS EN EL INDEX

    public function generarListaCategorias()
    {
        $conexion = new conexion();
        $consulta = "SELECT * FROM categoria";
        $listadoCategorias = $conexion->ejecutar_consulta($consulta);

        return $listadoCategorias;
    }

    public function generarListaProductos()
    {
        $conexion = new conexion();
        $consulta = "SELECT * FROM producto";
        $listadoProductos = $conexion->ejecutar_consulta($consulta);

        return $listadoProductos;
    }

    public function desplegarInfoProducto($id)
    {
        $conexion = new conexion();

        $consulta = "SELECT * FROM producto WHERE idProducto = " . $id;
        $infoProducto = $conexion->ejecutar_consulta($consulta);

        return $infoProducto;
    }

    //Desplegar Categoria para editarla
    public function desplegarCategoria($id)
    {
        $conexion = new conexion();

        $consulta = "SELECT * FROM categoria WHERE idCategoria = " . $id;
        $listadoCategorias = $conexion->ejecutar_consulta($consulta);

        return $listadoCategorias;
    }


    //VISUALIZAR Y FILTRAR DATOS EN EL INDEX
    public function verProductosIndex()
    {
        $conexion = new conexion();
        $consulta = "SELECT nombre,precio,foto FROM producto ORDER BY idProducto ASC ;";
        $listadoClientes = $conexion->ejecutar_consulta($consulta);

        return $listadoClientes;
    }
    
    
    public function filtrarProductosIndex($filtro)
    {
        $conexion = new conexion();
        $consulta = "SELECT nombre,precio,foto FROM producto WHERE categoria = " ."'".$filtro ."'". " ORDER BY idProducto ASC;";
        $listadoProductos = $conexion->ejecutar_consulta($consulta);

        return $listadoProductos;
    }

    /*Usuarios*/
    public function generarListaUsuarios()
    {
        $conexion = new conexion();
        $consulta = "SELECT * FROM user";
        $listadoUsuarios = $conexion->ejecutar_consulta($consulta);

        return $listadoUsuarios;
    }

    public function desplegarInfoUsuario($id) 
    {
        $conexion = new conexion();

        $consulta = "SELECT * FROM user WHERE iduser = " . $id;
        $infoUsuario = $conexion->ejecutar_consulta($consulta);

        return $infoUsuario;
    }


}
