<?php
require_once "Modelo/ConexionBD.php";
require_once "Modelo/auto.php";

class AutoControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Auto;
    }

    public function Inicio(){
        require_once "vista/Encabezado.php";
        require_once "vista/CrudAutos/listar.php"; //Este nombre puede hacer referencia a lo que hace
        require_once "vista/pie.php";
    }

    public function FormAutoCrear(){
        $accionCrud="Insertar";
        $per=new Auto();
        if(isset($_GET['id'])){
            $per=$this->modelo->CargarDatosxID($_GET['id']);
            
        }
        
        require_once "vista/encabezado.php";
        require_once "vista/CrudAutos/formAutoCrear.php"; //Este nombre puede hacer referencia a lo que hace
        require_once "vista/pie.php";

    }

    public function formAutoActualizar(){
        $accionCrud = "Actualizar";
        $per = new Auto();
        if (isset($_GET['id'])) {
            $per=$this->modelo->CargarDatosxID($_GET['id']);
        }
        
        require_once "vista/encabezado.php";
        require_once "vista/CrudAutos/formAutoActualizar.php"; //Este nombre puede hacer referencia a lo que hace
        require_once "vista/pie.php";
    }

    public function Actualizar(){
        $auto = new Auto();

        $auto -> setper_id_Auto($_POST['id_Auto']);
        $auto -> setper_marca($_POST['marca']);
        $auto -> setper_modelo($_POST['modelo']);
        $auto -> setper_color($_POST['color']);
        $auto -> setper_cantidad($_POST['cantidad']);
        $auto -> setper_precio($_POST['precio']);
        
        $this->modelo->Actualizar($auto);

        header("location:?c=auto");
    }

    public function Guardar(){
        $auto= new auto();

        $auto->setper_id_Auto($_POST['id_Auto']);
        $auto->setper_marca($_POST['marca']);
        $auto->setper_modelo($_POST['modelo']);
        $auto->setper_color($_POST['color']);
        $auto->setper_cantidad($_POST['cantidad']);
        $auto->setper_precio($_POST['precio']);

        $this->modelo->Insertar($auto);

        header("location:?c=auto");

    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=auto");
    }
}


?>