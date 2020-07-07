<?php include_once "../../data/crudLibGen.php"; //llamamos al crud
$obj = new CrudLibGen();
$datos = $obj->_listadoLibGen();
$tabla = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                 <th>Editorial Libro</th>
                 <th>Nombre Libro</th>
                 <th>Genero Libro</th>
                 <th>Acciones</th>
            </tr>
        </thead>
        <tbody>';
$datostabla = "";
foreach ($datos as $key => $value) {
    $datostabla = $datostabla . '<tr>
                               <th>' . $value['nombre'] . '</th>
                               <th>' . $value['titulo'] . '</th>
                               <th>' . $value['genero'] . '</th>
                               <th>
                               <button type="button" class="btn btn-primary btn-sm" title="Editar" 
                                                data-toggle="modal" data-target="#modalEditLibroGen"
                                                onclick="editarId(' . $value['id_librogenero'] . ')">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar" 
                                                data-toggle="modal" data-target="#modalEliminarLibroGen"
                                                onclick="eliminarId(' . $value['id_librogenero'] . ')">
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