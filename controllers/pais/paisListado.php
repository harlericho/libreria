<?php include "../../data/crudPais.php"; //llamamos al crud
$obj = new CrudPais;
$datos = $obj->_listadoPais();
$tabla = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                 <th>Origen</th>
                 <th>Estado</th>
            </tr>
        </thead>
        <tbody>';
$datostabla = "";
foreach ($datos as $key => $value) {
    $datostabla = $datostabla . '<tr>
                               <th>' . $value['pais'] . '</th>
                               <th>
                               <button type="button" class="btn btn-success btn-circle">
                               <i class="fa fa-font"></i></button>
                               </th>
                               </tr>';
}
echo $tabla . $datostabla . ' </tbody></table>';
?>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>