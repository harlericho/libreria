<?php include_once "../templates/header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <center>
                        <img src="../image/registro.png" width="60" height="60" />
                        <div class="login-logo">
                            <a href="#">
                                <h3><b>SISTEMA</b> libreria</h3>
                            </a>
                        </div>
                        <h3 class="panel-title">Registro Usuarios</h3>
                    </center>
                </div>
                <div class="panel-body">
                    <form role="form" id="formRegistro">
                        <fieldset>
                        <div class="form-group">
                                <input class="form-control" placeholder="Nombres" id="txtnombres" name="txtnombres" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Dni" id="txtdni" name="txtdni" type="text" maxlength="10" onkeypress="return soloNumeros(event)">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" id="txtemail" name="txtemail" type="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contraseña" id="txtpass" name="txtpass" type="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirmar contraseña" id="txtpassc" name="txtpassc" type="password">
                            </div>
                            <div class="checkbox">

                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <a href="#" class="btn btn-lg btn-success btn-block" onclick="registro()">
                                <i class="fa fa-user"></i>
                                Registrar</a>
                        </fieldset>
                        <center>
                            <p class="mt-5 mb-8 text-muted">
                                <br>
                                <a href="login.php" class="text-center">Ir a inicio<b/a>
                            </p>
                        </center>
                    </form>
                </div>
                <center>
                    <p class="mt-5 mb-3 text-muted">© 2020-2021</p>
                    <div class="copyright">
                        &copy; Copyright <strong><span>Harlericho</span></strong>
                        <a href="https://twitter.com/CarlChokSanc">CarlChokSanc</a>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
<?php include_once "../templates/footer.php"; ?>
<script src="../scripts/login.js" type="text/javascript"></script>

<script type="text/javascript">
// Solo permite ingresar numeros.
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
</script>