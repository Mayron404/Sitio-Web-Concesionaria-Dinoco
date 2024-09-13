<div class="content-wrapper">
    <div class="page-title">
        <div>
            <br>
            <h1><i class="fa fa-car"></i>      AUTO</h1>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="well bs-component">

                            <form class="form-horizontal" method="POST" action="?c=auto&a=Actualizar">
                                <fieldset>
                                    <legend ><?=$accionCrud?> Datos</legend>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="lblAutoId">ID AUTO</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="id_Auto" type="text" placeholder="ID Auto" value = "<?=$per->getper_id_Auto()?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="lblmarca">MARCA</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="marca" type="text" placeholder="Marca" value = "<?=$per->getper_marca()?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="lblmodelo">MODELO</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="modelo" type="text"
                                                placeholder="Modelo" value = "<?=$per->getper_modelo()?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="lblcolor">COLOR</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="color" type="text" 
                                                placeholder="Color" value = "<?=$per->getper_color()?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="lblcantidad">CANTIDAD</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="cantidad" type="text" 
                                                placeholder="Cantidad" value = "<?=$per->getper_cantidad()?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="lblprecio">PRECIO</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="precio" type="text" 
                                                placeholder="Precio" value = "<?=$per->getper_precio()?>">
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-success" type="submit">Actualizar</button>

                                            <button class="btn btn-secondary" type="reset">Cancelar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>                 
            </div>  
        </div>
    </div>