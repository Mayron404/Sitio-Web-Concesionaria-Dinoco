<?php

class InicioControlador{
    private $modelo;

    public function CONSTRUCT(){
        //this ->modelo=new Producto();
    }

    public function Inicio(){
        //echo  "Este es el controlador de Inicio";
        //$bd=ConexionBD::Conectar();
        
        require_once "vista/Encabezado.php";
        require_once "vista/CrudAutos/formAutoCrear.php";
        require_once "vista/pie.php";
        //Ahora creamos la vista que queremos devolver

    }
}

?>