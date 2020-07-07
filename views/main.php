<?php include_once "../templates/header.php" ?>
<div id="wrapper">
    <?php include_once "../templates/nav.php" ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sistema Libreria</h1>
                </div>
                <?php include_once "../models/listadoLibros.php"; ?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include_once "../models/modalPresentacion.php" ?>
<?php include_once "../templates/footer.php" ?>

<script type="text/javascript">
    vistaGeneralLibros();
</script>
<script src="../scripts/modalInicial.js" type="text/javascript"></script>
