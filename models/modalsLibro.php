<?php include "../data/crudEditorial.php" ?>
<!-- Modal -->
<div class="modal fade" id="modalAddLibro" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Nuevo Libro</h4>
            </div>
            <div class="modal-body">
                <form role="form" enctype="multipart/form-data" id="formaddlibro" method="POST">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Editorial</label>
                            <select id="selecteditlib" name="selecteditlib" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudEditorial::_listadoEditorial() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_editorial']; ?>"><?php echo $value['nombre']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Titulo</label>
                            <input class="form-control" id="txtnombrelib" name="txtnombrelib" type="text" placeholder="Titulo">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Num paginas</label>
                            <input class="form-control" id="txtnumpaglib" name="txtnumpaglib" type="text" placeholder="Num-paginas" onKeyPress="return soloNumeros(event)">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Ediccion</label>
                            <input class="form-control" id="txtediccionlib" name="txtediccionlib" type="text" placeholder="Descripcion">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Descripcion</label>
                            <input class="form-control" id="txtdescripcionlib" name="txtdescripcionlib" type="text" placeholder="Descripcion">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Portada</label>
                            <center>
                                <img id="imglib" src="../image/default.png" width="70" height="70">
                            </center>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="file" id="filelib" name="filelib" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Año</label>
                            <input class="form-control" id="txtannlib" name="txtannlib" type="text" placeholder="Año" onKeyPress="return soloNumeros(event)" maxlength="4">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadolib" name="selectestadolib" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" title="Guardar" onclick="guardarLibro()"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEditLibro" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Editar Libro</h4>
            </div>
            <div class="modal-body">
                <form role="form" enctype="multipart/form-data" id="formeditlibro" method="POST">
                    <fieldset>
                        <input type="hidden" id="txtided" name="txtided">
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Editorial</label>
                            <select id="selecteditlibed" name="selecteditlibed" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudEditorial::_listadoEditorial() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_editorial']; ?>"><?php echo $value['nombre']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Titulo</label>
                            <input class="form-control" id="txtnombrelibed" name="txtnombrelibed" type="text" placeholder="Titulo">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Num paginas</label>
                            <input class="form-control" id="txtnumpaglibed" name="txtnumpaglibed" type="text" placeholder="Num-paginas" onKeyPress="return soloNumeros(event)">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Ediccion</label>
                            <input class="form-control" id="txtediccionlibed" name="txtediccionlibed" type="text" placeholder="Descripcion">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Descripcion</label>
                            <input class="form-control" id="txtdescripcionlibed" name="txtdescripcionlibed" type="text" placeholder="Descripcion">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Portada</label>
                            <input type="hidden" id="urlimagened" name="urlimagened">
                            <center>
                                <img id="imglibed" src="" width="70" height="70">
                            </center>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="file" id="filelibed" name="filelibed" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Año</label>
                            <input class="form-control" id="txtannlibed" name="txtannlibed" type="text" placeholder="Año" onKeyPress="return soloNumeros(event)" maxlength="4">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadolibed" name="selectestadolibed" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" title="Modificar" onclick="modificarLibro()"><i class="fa fa-edit"></i> Modificar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEliminarLibro" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Eliminar Libro</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formeliminarlibro" method="POST">
                    <input type="hidden" id=txtidlibel name="txtidlibel">
                    <fieldset>
                        <center>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect"><h4>¿ Esta seguro que desea eliminar este libro ?</h4></label>
                        </div>
                        </center>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar" onclick="modalCerrado()"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-danger" title="Eliminar" onclick="eliminarLibro()"><i class="fa fa-trash"></i> Eliminar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<script type="text/javascript">
    // Solo permite ingresar numeros.
    function soloNumeros(e) {
        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57)
    }
</script>