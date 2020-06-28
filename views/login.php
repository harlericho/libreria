<?php include "../templates/header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <center>
                        <img src="../image/login.png" width="60" height="60" />
                        <div class="login-logo">
                            <a href="#">
                                <h3><b>SISTEMA</b> libreria</h3>
                            </a>
                        </div>
                        <h3 class="panel-title">Iniciar Sessión</h3>
                    </center>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">

                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <a href="index.html" class="btn btn-lg btn-success btn-block">
                                <i class="fa fa-sign-in"></i>
                                Entrar</a>
                        </fieldset>
                        <center>
                            <p class="mt-5 mb-8 text-muted">
                                <br>
                                <a href="registro.php" class="text-center">Registro nuevo</a>
                            </p>
                            <p class="mt-5 mb-8 text-muted">
                                <br>
                                <a href="#" class="text-center">Modo admin</a>
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
<?php include "../templates/footer.php"; ?>
<script src="../scripts/login.js" type="text/javascript"></script>