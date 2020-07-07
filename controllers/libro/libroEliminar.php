<?php include_once "../../data/crudLibros.php"; //llamamos al crud
$estado = 'I';
$datos = array(
    'id_libro' => $_POST['txtidlibel'],
    'estado' => $estado,
);
echo CrudLibros::_eliminarLibro($datos);