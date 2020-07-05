<?php include "../../data/crudStock.php"; //llamamos al crud
$obj = new CrudStock();
$datos = $obj->_listadoStock();
$tabla = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                 <th>Editorial</th>
                 <th>Nombre Libro</th>
                 <th>Stock Min</th>
                 <th>Stock Max</th>
                 <th>Valor</th>
                 <th>Descuento %</th>
                 <th>Estado</th>
                 <th>Acciones</th>
            </tr>
        </thead>
        <tbody>';
$datostabla = "";
foreach ($datos as $key => $value) {
    $datostabla = $datostabla . '<tr>
                               <th>' . $value['nombre'] . '</th>
                               <th>' . $value['titulo'] . '</th>
                               <th>' . $value['stock_min'] . '</th>
                               <th>' . $value['stock_max'] . '</th>
                               <th>' . $value['valor'] . '</th>
                               <th>' . $value['descuento'] . '</th>
                               <th>
                               <button type="button" class="btn btn-success btn-circle">
                               <i class="fa fa-font"></i></button>
                               </th>
                               <th>
                               <button type="button" class="btn btn-primary btn-sm" title="Editar" 
                                                data-toggle="modal" data-target="#modalEditStock"
                                                onclick="editarId(' . $value['id_parametro'] . ')">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar" 
                                                data-toggle="modal" data-target="#modalEliminarStock"
                                                onclick="eliminarId(' . $value['id_parametro'] . ')">
                                            <i class="fa fa-trash"></i>
                                        </button>
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