<?php include "../../data/crudEditorial.php"; //llamamos al crud
$nombre = $_POST['txtnombreed'];
$email = $_POST['txtemailed'];
$datos = array(
    'nombre' => $_POST['txtnombreeded'],
    'direccion' => $_POST['txtdireccioneded'],
    'email' => $_POST['txtemaileded'],
    'estado' => $_POST['selectestadoeded'],
    'id_pais' => $_POST['selectpaiseded'],
    'id_editorial' => $_POST['txtided'],
);

echo CrudEditorial::_modificarEditorial($datos);