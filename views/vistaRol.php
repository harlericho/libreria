<?php include_once "../templates/header.php" ?>
<div id="wrapper">
    <?php include_once "../templates/nav.php" ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Roles</h1>
                </div>
                <div class="panel-heading">
                    <button type="button" class="btn btn-primary" title="Nuevo registro"
                    data-toggle="modal" data-target="#modalAddRol">
                        <i class="fa fa-plus"></i> Nuevo
                    </button>
                    <?php include_once "../models/modalsRol.php"?>
                </div>
                <?php include_once "../models/listadoRol.php"; ?>
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
    vistaRol();
    focusInicial();
</script>