<!-- Modal -->
<div class="modal fade" id="modalAddPais" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-flag"></i> Nuevo Origen</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="formaddpais" method="POST">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Nombre</label>
                            <input class="form-control" id="txtnombrepa" name="txtnombrepa" type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="disabledSelect">Estado</label>
                            <select id="selectestadopa" name="selectestadopa" class="form-control">
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
                <button type="button" class="btn btn-primary" title="Guardar" onclick="guardarPais()"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->