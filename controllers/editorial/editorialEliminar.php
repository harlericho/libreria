<?php include "../../data/crudEditorial.php"; //llamamos al crud
$estado = 'I';
$datos = array(
    'id_editorial' => $_POST['txtidedel'],
    'estado' => $estado,
);
echo CrudEditorial::_eliminarEditorial($datos);
