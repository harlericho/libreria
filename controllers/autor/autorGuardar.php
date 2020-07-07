<?php include_once "../../data/crudAutor.php"; //llamamos al crud
$nombre = $_POST['txtnombreau'];
$email = $_POST['txtemailau'];
$datos = array(
    'nombre' => strtoupper($_POST['txtnombreau']),
    'email' => strtolower($_POST['txtemailau']),
    'estado' => $_POST['selectestadoau'],
    'id_pais' => $_POST['selectpaisau'],
);
if (CrudAutor::_validarNombreAutor($nombre)) {
    echo 2;
} else  if (CrudAutor::_validarEmailAutor($email)) {
    echo 3;
} else {
    echo CrudAutor::_agregarAutor($datos);
}
