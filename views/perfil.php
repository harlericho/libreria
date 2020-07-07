<?php include "../templates/header.php" ?>
<div id="wrapper">
    <?php include "../templates/nav.php" ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perfil Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php include "../models/vistaPerfil.php"; ?>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<?php include "../templates/footer.php" ?>