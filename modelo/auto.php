<?php
require_once "Modelo/ConexionBD.php";
class Auto{

    private $pdo;
    
    private $per_id_Auto;
    private $per_marca;
    private $per_modelo;
    private $per_color;
    private $per_cantidad;
    private $per_precio;

    public function __CONSTRUCT(){
        $conexionBD = new ConexionBD();
        $this->pdo = $conexionBD->Conectar();
    }

    //Realizar todos los Get y Sets.
    //El signo de pregunta es para decir que puede ser Null.
    //Desde PHP 7 podemos definir el tipo de parametro que esperemos

    public function getper_id_Auto() : ?string {
        return $this->per_id_Auto;
    }

    public function setper_id_Auto(string $id_Auto) {
        $this->per_id_Auto = $id_Auto;
    }

    public function getper_marca() : ?string{
        return $this->per_marca;
    }

    public function setper_marca(string $marca){
        $this->per_marca=$marca;
    }

    public function getper_modelo() : ?string{
        return $this-> per_modelo;
    }

    public function setper_modelo(string $modelo){
        $this->per_modelo=$modelo;
    }

    public function getper_color() : ?string{
        return $this-> per_color;
    }

    public function setper_color(string $color){
        $this->per_color=$color;
    }

    public function getper_cantidad() : ?string{
        return $this-> per_cantidad;
    }

    public function setper_cantidad(string $cantidad){
        $this->per_cantidad=$cantidad;
    }

    public function getper_precio() : ?string{
        return $this-> per_precio;
    }

    public function setper_precio(string $precio){
        $this->per_precio=$precio;
    }

    public function Listar(){
        try {
         $consulta = $this->pdo->prepare("SELECT * FROM autos;");
         $consulta->execute();
         return $consulta->fetchAll(PDO::FETCH_OBJ);
        } 
        catch (Exception $e) {
         die($e->getMessage());
         
        } 
    }

    public function Insertar(Auto $p){
        try{ 
             $consulta="INSERT INTO 
             autos(id_Auto,marca,modelo,color,cantidad,precio)
             VALUES (?,?,?,?,?,?);";
             $this->pdo->prepare($consulta)->execute(array(
                $p->getper_id_Auto(),
                $p->getper_marca(),
                $p->getper_modelo(),
                $p->getper_color(),
                $p->getper_cantidad(),
                $p->getper_precio(),
            ));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Auto $autos) {
        try {
            $consulta = "UPDATE autos SET marca = ?, modelo = ?, color = ?, cantidad = ?, precio = ? WHERE id_Auto = ?;";
            $this->pdo->prepare($consulta)->execute(array(
                $autos->getper_marca(),
                $autos->getper_modelo(),
                $autos->getper_color(),
                $autos->getper_cantidad(),
                $autos->getper_precio(),
                $autos->getper_id_Auto()
                /*Al agregar los datos al array hay que enviarlos en el mismo orden que se ocupan*/
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function CargarDatosxID($id){
        try{
            $consulta=$this->pdo->prepare('SELECT * FROM autos WHERE id_Auto = ?;');
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            //INSTANCIAMOS UN NUEVO OBJETO DE LA CLASE PERSONA

                $per=new Auto();
                $per->setper_id_Auto($r->id_Auto);
                $per->setper_marca($r->marca);
                $per->setper_modelo($r->modelo);
                $per->setper_color($r->color);
                $per->setper_cantidad($r->cantidad);
                $per->setper_precio($r->precio);

            return $per;
        }
        catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{ 
            $consulta="DELETE FROM autos WHERE id_Auto=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}


?>