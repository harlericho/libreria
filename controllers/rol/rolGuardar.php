<?php include "../../data/crudRol.php"; //llamamos al crud
$descripcion = $_POST['txtnombrerol'];
$datos = array(
    'descripcion' =>  strtoupper($_POST['txtnombrerol']),
    'estado' => $_POST['selectestadorol'],
);
if (CrudRol::_validarNombreRol($descripcion)) {
    echo 2;
} else {
    echo CrudRol::_agregarRol($datos);
}
