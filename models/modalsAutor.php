<?php include "../data/crudPais.php" ?>
<!-- Modal -->
<div class="modal fade" id="modalAddAutor" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-plus"></i> Nuevo Autor</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formaddautor" method="POST">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Pais</label>
                            <select id="selectpaisau" name="selectpaisau" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudPais::_listadoPais() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_pais']; ?>"><?php echo $value['pais']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Nombre</label>
                            <input class="form-control" id="txtnombreau" name="txtnombreau" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Email</label>
                            <input class="form-control" id="txtemailau" name="txtemailau" type="email" placeholder="E-mail">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadoau" name="selectestadoau" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Close</button>
                <button type="button" class="btn btn-primary" title="Gaurdar" onclick="guardarAutor()"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEditAutor" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-plus"></i> Editar Autor</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formeditautor" method="POST">
                <input type="hidden" id=txtided name="txtided">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Pais</label>
                            <select id="selectpaisaued" name="selectpaisaued" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <?php foreach (CrudPais::_listadoPais() as $key => $value) : ?>
                                    <option value="<?php echo $value['id_pais']; ?>"><?php echo $value['pais']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Nombre</label>
                            <input class="form-control" id="txtnombreaued" name="txtnombreaued" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Email</label>
                            <input class="form-control" id="txtemailaued" name="txtemailaued" type="email" placeholder="E-mail">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadoaued" name="selectestadoaued" class="form-control">
                                <option selected disabled value="">-Seleccione-</option>
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                            </select>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Close</button>
                <button type="button" class="btn btn-primary" title="Modificar" onclick="modificarAutor()"><i class="fa fa-save"></i> Modificar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalEliminarAutor" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-institution"></i> Eliminar Autor</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formeliminarautor" method="POST">
                    <input type="hidden" id=txtidauel name="txtidauel">
                    <fieldset>
                        <center>
                        <div class="form-group col-sm-12">
                            <label for="disabledSelect"><h4>¿ Esta seguro que desea eliminar este autor ?</h4></label>
                        </div>
                        </center>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar" onclick="modalCerrado()"><i class="fa fa-reply"></i> Close</button>
                <button type="button" class="btn btn-danger" title="Eliminar" onclick="eliminarAutor()"><i class="fa fa-trash"></i> Eliminar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->