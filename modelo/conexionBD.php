<?php
Class ConexionBD{
    const server="localhost";
    const userdb="root";
    const passdb="";
    const namedb="bdautos";

    //CREAMOS LA FUNCION CONECTAR DE MANERA ESTATICA PARA NO NECESITAR INSTANCIAR
    //RECORDEMOS QUE AL HACERLO DE ESTA MANERA SE UTILIZA LA PALABRA RESERVADA "selft"
    //EN LUGAR DE "this" PARA LLAMAR UN ATRIBUTO DE LA MISMA CLASE.


    public static function Conectar(){
        //Debemos cambiar ConexionBD por PDO, PDO es palabra reservada que significa
        //PHP Data Objects, Objetos de Datos de PHP,
        //en extension para acceder a bases de datos
        try{
            $conexion = new PDO("mysql:host=" .self::server . ";dbname=".self::namedb.
            ";charset=utf8",self::userdb,self::passdb);

            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conexion;

        }
        catch(PDOException $e){
            return "Fallo la conexion ".$e->getMessage();
        }
    }



}

?>