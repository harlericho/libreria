<?php include "../templates/header.php" ?>
<div id="wrapper">
    <?php include "../templates/nav.php" ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sistema Libreria</h1>
                </div>
                <?php include "../models/listadoLibros.php"; ?>
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
    vistaGeneralLibros();
</script>
