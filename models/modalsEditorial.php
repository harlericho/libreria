<!-- Modal -->
<div class="modal fade" id="modalAddEditorial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content col-sm-10">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-institution"></i> Nuevo Editorial</h4>
            </div>
            <div class="modal-body">
                <form id="modaladdeditorial">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="disabledSelect">Nombre</label>
                            <input class="form-control" id="txtnombre" name="txtnombre" type="text" placeholder="Nombre" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Direccion</label>
                        <input class="form-control" id="txtdireccion" name="txtdireccion" type="text" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Email</label>
                        <input class="form-control" id="txtemail" name="txtemail" type="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="disabledSelect">Estado</label>
                        <select id="txtestado" name="txtestado" class="form-control">
                            <option selected disabled value="">-Seleccione-</option>
                            <option value="A">Activo</option>
                            <option value="I">Inactivo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar"><i class="fa fa-reply"></i> Close</button>
                <button type="button" class="btn btn-primary" title="Gaurdar"><i class="fa fa-save"></i> Gaurdar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->