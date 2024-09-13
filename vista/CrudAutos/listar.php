<?php
require_once "Modelo/ConexionBD.php";
require_once "Modelo/auto.php";
$modelo = new Auto();
$resultados = $modelo->Listar();
?>  

<body>
  <script>
    function eliminar(){
      var respuesta=confirm("¿Estás seguro que deseas Eliminar este Auto?")
      return respuesta
    }
  </script>
  

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>AUTOS</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-car fa-lg"></i></li>
              <li class="active"><a href="#"></a></li>
              <li><i class="fa fa-car fa-lg"></i></li>
            </ul>
          </div>
          <div><a class="btn btn-primary btn-flat" href="?c=auto&a=FormAutoCrear"><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-info btn-flat" href="#"><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-danger btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a></div>
        </div>

        <div class="container-fluid">
          <form class="d-flex">
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text"
            placeholder="Buscador con JS">
            <hr>
          </form>
        </div>

        <br>

        <table class="table table-striped table-darktable_id">
          <thead>
            <tr>

              <th>ID Auto</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Color</th>
              <th>Cantidad</th>
              <th>Precio</th>

            </tr>
          </thead>
          <tbody>

<?php

$conexion=mysqli_connect("localhost","root","","bdautos");
$where="";
$SQL="SELECT autos.id, autos.marca, autos.modelo, autos.color, autos.cantidad, autos.precio,
FROM autos
LEFT JOIN autos ON autos.rol = autos.id $where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
  while($fila=mysqli_fetch_array($dato)){
?>
<tr>
  <td><?php echo $fila['marca']; ?></td>
  <td><?php echo $fila['modelo']; ?></td>
  <td><?php echo $fila['color']; ?></td>
  <td><?php echo $fila['cantidad']; ?></td>
  <td><?php echo $fila['precio']; ?></td>

<td>

<a class="btn btn-warning" href="editar_user.php?id=<? $fila['id']?> ">
<i class="fa fa-trash"></i></a>

</td>
</tr>

<?php
  }
}else{

  ?>
  <tr class="text-center">
  <td colspan="16">No existen registros</td>
  </tr>

  <?php

}

?>
          
        </table>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID Auto</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Color</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($resultados as $r) : ?>
                  <tr>
                      <td><?= $r->id_Auto ?></td>
                      <td><?= $r->marca ?></td>
                      <td><?= $r->modelo ?></td>
                      <td><?= $r->color ?></td>
                      <td><?= $r->cantidad ?></td>
                      <td><?= $r->precio ?></td>
                      <td>
                        
                        <center>
                          <a class="btn btn-info btn-flat" href="?c=auto&a=formAutoActualizar&id=<?=$r->id_Auto ?>">
                            <i class="fa fa-lg fa-refresh"></i>
                          </a>
                          ||
                          <a onclick="return eliminar()" class="btn btn-danger btn-flat" href="?c=auto&a=Borrar&id=<?=$r->id_Auto?>">
                            <i class="fa fa-lg fa-trash"></i></a>
                        </center>

                      </td>
                  </tr>
                 <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</body>

<script src="./assets/js/buscador.js"></script>
</html>