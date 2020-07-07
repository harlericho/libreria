<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
}
include_once "../data/crudUsuario.php";
foreach (CrudLoginRegistro::_obtenerUser($_SESSION['usuario']) as $key => $value) {
    $nombres = $value['nombres'];
    $dni = $value['dni'];
    $email = $value['email'];
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><img src="../image/libreria.ico" width="25" height="25"></a>
        <a class="navbar-brand" href="#">Libreria</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="../views/main.php"><i class="fa fa-home fa-fw"></i> Inicio</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo $nombres ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $dni ?></a>
                </li>
                <li><a href="#"><i class="fa fa-envelope fa-fw"></i> <?php echo $email ?></a>
                </li>
                <li class="divider"></li>
                <li><a href="../views/cerrarSession.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <?php include_once "menu.php" ;?>
    <!-- /.navbar-static-side -->
</nav>
<?php }?>