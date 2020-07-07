<?php include_once "../../data/crudEditorial.php"; //llamamos al crud
$obj = new CrudEditorial;
$datos = $obj->_listadoEditorial();
$tabla = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                 <th>Nombre</th>
                 <th>Direccion</th>
                 <th>Email</th>
                 <th>Origen</th>
                 <th>Estado</th>
                 <th>Acciones</th>
            </tr>
        </thead>
        <tbody>';
$datostabla = "";
foreach ($datos as $key => $value) {
    $datostabla = $datostabla . '<tr>
                               <th>' . $value['nombre'] . '</th>
                               <th>' . $value['direccion'] . '</th>
                               <th>' . $value['email'] . '</th>
                               <th>' . $value['pais'] . '</th>
                               <th>
                               <button type="button" class="btn btn-success btn-circle">
                               <i class="fa fa-font"></i></button>
                               </th>
                               <th>
                               <button type="button" class="btn btn-primary btn-sm" title="Editar" 
                                                data-toggle="modal" data-target="#modalEditEditorial"
                                                onclick="editarId('.$value['id_editorial'].')">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar" 
                                                data-toggle="modal" data-target="#modalEliminarEditorial"
                                                onclick="eliminarId('.$value['id_editorial'].')">
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