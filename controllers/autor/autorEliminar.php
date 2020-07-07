<?php include_once "../../data/crudAutor.php"; //llamamos al crud
$estado = 'I';
$datos = array(
    'id_autor' => $_POST['txtidauel'],
    'estado' => $estado,
);
echo CrudAutor::_eliminarAutor($datos);