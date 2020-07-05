<?php include "../../data/crudPais.php"; //llamamos al crud
$pais = $_POST['txtnombrepa'];
$datos = array(
    'pais' =>  strtoupper($_POST['txtnombrepa']),
    'estado' => $_POST['selectestadopa'],
);
if (CrudPais::_validarNombrePais($pais) ){
    echo 2;
} else {
    echo CrudPais::_agregarPais($datos);
}
