<?php include_once "../../data/crudEditorial.php"; //llamamos al crud
$nombre = $_POST['txtnombreed'];
$email = $_POST['txtemailed'];
$datos = array(
    'nombre' => strtoupper($_POST['txtnombreeded']),
    'direccion' => strtoupper($_POST['txtdireccioneded']),
    'email' => strtolower($_POST['txtemaileded']),
    'estado' => $_POST['selectestadoeded'],
    'id_pais' => $_POST['selectpaiseded'],
    'id_editorial' => $_POST['txtided'],
);

echo CrudEditorial::_modificarEditorial($datos);
