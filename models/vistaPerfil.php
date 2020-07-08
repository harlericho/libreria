<?php
include_once "../data/crudUsuario.php";
foreach (CrudLoginRegistro::_obtenerUser($_SESSION['usuario']) as $key => $value) {
    $id = $value['id_usuario'];
    $nombres = $value['nombres'];
    $dni = $value['dni'];
    $fecha = $value['fecha_nacimiento'];
    $direccion = $value['direccion'];
    $telefono = $value['telefono'];
    $email = $value['email'];
?>
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
                            <h3>Bienvenido: <?php echo $nombres ?></h3>
                            <form role="form" id="formusuario" method="POST">
                                <fieldset>
                                    <input type="hidden" id="txtid" name="txtid" value="<?php echo $id ?>">
                                    <div class="form-group col-sm-6">
                                        <label for="disabledSelect">Nombres:</label>
                                        <input class="form-control" id="nombreusu" name="nombreusu" type="text" value="<?php echo $nombres ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="disabledSelect">Dni:</label>
                                        <input class="form-control" id="dniusu" name="dniusu" type="text" placeholder="Dni"  value="<?php echo $dni ?>" readonly="readonly">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="disabledSelect">Direccion:</label>
                                        <input class="form-control" id="direccionusu" name="direccionusu" type="text" placeholder="Direccion" value="<?php echo $direccion ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="disabledSelect">Fecha nacimiento:</label>
                                        <input class="form-control" id="fechanacusu" name="fechanacusu" type="date" value="<?php echo $fecha ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="disabledSelect">Telefono:</label>
                                        <input class="form-control" id="telefonousu" name="telefonousu" type="number" placeholder="Telefooo" value="<?php echo $telefono ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="disabledSelect">Email:</label>
                                        <input class="form-control" id="emailnousu" name="emailnousu" type="email" placeholder="E-mail"  value="<?php echo $email ?>" readonly="readonly">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <a type="submit" class="btn btn-primary" title="Modificar" onclick="modificarUsu()"><i class="fa fa-edit"></i> Modificar</a>
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
<?php } ?>
<script src="../scripts/usuario.js" type="text/javascript"></script>