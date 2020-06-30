<?php include "../../data/crudLibros.php"; //llamamos al crud
$obj = new CrudLibros();
$datos = $obj->_listadoLibrosGeneral();
$tabla = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                 <th>Editorial</th>
                 <th>Portada</th>
                 <th>Titulo</th>
                 <th>Descripcion</th>
                 <th># Paginas</th>
                 <th>Edicion</th>
                 <th>Año</th>
                 <th>Estado</th>
            </tr>
        </thead>
        <tbody>';
$datostabla = "";
foreach ($datos as $key => $value) {
    $datostabla = $datostabla . '<tr>
                               <th>' . $value['nombre'] . '</th>
                               <th><img src="data:image/jpg;base64, ' . base64_encode($value['portada']) . '
                               " width="50" height="50"/></th>
                               <th>' . $value['titulo'] . '</th>
                               <th>' . $value['descripcion'] . '</th>
                               <th>' . $value['num_paginas'] . '</th>
                               <th>' . $value['edicion'] . '</th>
                               <th>' . $value['ann'] . '</th>
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