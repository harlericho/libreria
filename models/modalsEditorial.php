<?php include "../data/crudPais.php" ?>
<!-- Modal -->
<div class="modal fade" id="modalAddEditorial" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-institution"></i> Nuevo Editorial</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formaddeditorial" method="POST">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Pais</label>
                            <select id="selectpaised" name="selectpaised" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudPais::_listadoPais() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_pais']; ?>"><?php echo $value['pais']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Nombre</label>
                            <input class="form-control" id="txtnombreed" name="txtnombreed" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Direccion</label>
                            <input class="form-control" id="txtdireccioned" name="txtdireccioned" type="text" placeholder="Direccion">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Email</label>
                            <input class="form-control" id="txtemailed" name="txtemailed" type="email" placeholder="E-mail">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadoed" name="selectestadoed" class="form-control">
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
                <button type="button" class="btn btn-primary" title="Guardar" onclick="guardarEditorial()"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<!-- Modal -->
<div class="modal fade" id="modalEditEditorial" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-institution"></i> Editar Editorial</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formediteditorial" method="POST">
                    <input type="hidden" id=txtided name="txtided">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Pais</label>
                            <select id="selectpaiseded" name="selectpaiseded" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudPais::_listadoPais() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_pais']; ?>"><?php echo $value['pais']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Nombre</label>
                            <input class="form-control" id="txtnombreeded" name="txtnombreeded" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect">Direccion</label>
                            <input class="form-control" id="txtdireccioneded" name="txtdireccioneded" type="text" placeholder="Direccion">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Email</label>
                            <input class="form-control" id="txtemaileded" name="txtemaileded" type="email" placeholder="E-mail">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadoeded" name="selectestadoeded" class="form-control">
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
                <button type="button" class="btn btn-primary" title="Modificar" onclick="modificarEditorial()"><i class="fa fa-edit"></i> Modificar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEliminarEditorial" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-institution"></i> Eliminar Editorial</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formeliminareditorial" method="POST">
                    <input type="hidden" id=txtidedel name="txtidedel">
                    <fieldset>
                        <center>
                            <div class="form-group col-sm-12">
                                <label for="disabledSelect">
                                    <h4>¿ Esta seguro que desea eliminar esta editorial ?</h4>
                                </label>
                                <h4 id="txtnombreedel" style="font-size: x-large; color:brown"></h4>
                                <h5 id="txtdireccionedel" style="font-size: medium; color:crimson"></h5>
                            </div>
                        </center>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar" onclick="modalCerrado()"><i class="fa fa-reply"></i> Cerrar</button>
                <button type="button" class="btn btn-danger" title="Eliminar" onclick="eliminarEditorial()"><i class="fa fa-trash"></i> Eliminar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->