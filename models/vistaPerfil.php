<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Actualizar datos personales
            </div>
            <div class="panel-body">
                <div class="row">
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-8">
                        <h3> @Admin</h3>
                        <form role="form" id="formusuario" method="POST">
                            <fieldset>
                                <div class="form-group col-sm-6">
                                    <label for="disabledSelect">Nombres:</label>
                                    <input class="form-control" id="nombreusu" name="nombreusu" type="text" placeholder="Nombres">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="disabledSelect">Dni:</label>
                                    <input class="form-control" id="dniusu" name="dniusu" type="text" placeholder="Dni" disabled>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="disabledSelect">Direccion:</label>
                                    <input class="form-control" id="direccionusu" name="direccionusu" type="text" placeholder="Direccion">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="disabledSelect">Fecha nacimiento:</label>
                                    <input class="form-control" id="fechanacusu" name="fechanacusu" type="date">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="disabledSelect">Telefono:</label>
                                    <input class="form-control" id="telefonousu" name="telefonousu" type="number" placeholder="Telefooo">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="disabledSelect">Email:</label>
                                    <input class="form-control" id="emailnousu" name="emailnousu" type="email" placeholder="E-mail" disabled>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="disabledSelect">Estado:</label>
                                    <select id="selectestadousu" name="selectestadousu" class="form-control">
                                        <option selected disabled value="">-Seleccione-</option>
                                        <option value="A">Activo</option>
                                        <option value="I">Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-primary" title="Modificar" onclick="modificarUsu()"><i class="fa fa-edit"></i> Modificar</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
            </div>
        </div>
    </div>
</div>