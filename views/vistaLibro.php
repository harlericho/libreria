<?php include_once "../templates/header.php" ?>
<div id="wrapper">
    <?php include_once "../templates/nav.php" ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Libros</h1>
                </div>
                <div class="panel-heading">
                    <button type="button" class="btn btn-primary" title="Nuevo registro"
                    data-toggle="modal" data-target="#modalAddLibro">
                        <i class="fa fa-plus"></i> Nuevo
                    </button>
                    <?php include_once "../models/modalsLibro.php"?>
                </div>
                <?php include_once "../models/listadoLibro.php"; ?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>

<?php include_once "../templates/footer.php" ?>

<script type="text/javascript">
    vistaLibros();
    focusInicial();
    viewImage();
    viewImage2();
</script>