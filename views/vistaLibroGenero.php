<?php include "../templates/header.php" ?>
<div id="wrapper">
    <?php include "../templates/nav.php" ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Libros Generos</h1>
                </div>
                <div class="panel-heading">
                    <button type="button" class="btn btn-primary" title="Nuevo registro"
                    data-toggle="modal" data-target="#modalAddLibroGen">
                        <i class="fa fa-plus"></i> Nuevo
                    </button>
                    <?php include "../models/modalsLibroGenero.php"?>
                </div>
                <?php include "../models/listadolibroGenero.php"; ?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>

<?php include "../templates/footer.php" ?>

<script type="text/javascript">
    vistaLibroGenero();
    focusInicial();
</script>