<?php
//Como la base de datos se va a llamar desde todos los controladores.
//Lo que hacemos es que lo vinculamos desde el FrontControler

require_once"modelo/ConexionBD.php";

//Explicación
//Debemos crear la logica que llamara a los controladores
//Esto lo hacemos usando el ISSET cuya funcion es ver si una variable a
//sido declarada y su funcion no es NULL.

/*
if(!isset($_GET['c'])){
    echo "Inicia";
}
else{
    echo $_GET['c'];
}
*/

//Lo que necesitamos es Instanciar un controlador y llamar a 
//un metodo de ese controlador para que nos pase la vista.

if(!isset($_GET['c'])){
    require_once "controlador/inicio.controlador.php";
    $controlador= new InicioControlador();
    call_user_func(array($controlador,"Inicio"));

}
else{
    $controlador = $_GET['c'];
    require_once "controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador)."controlador";
    $controlador = new $controlador;
    $accion = isset($_GET['a']) ? $_GET['a']:"Inicio";
    call_user_func(array($controlador,$accion
));

}

?>