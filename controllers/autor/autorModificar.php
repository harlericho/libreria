<?php include "../../data/crudAutor.php"; //llamamos al crud
$nombre = $_POST['txtnombreed'];
$email = $_POST['txtemailed'];
$datos = array(
    'nombre' => strtoupper( $_POST['txtnombreaued']),
    'email' =>  strtolower($_POST['txtemailaued']),
    'estado' => $_POST['selectestadoaued'],
    'id_pais' => $_POST['selectpaisaued'],
    'id_autor' => $_POST['txtided'],
);

echo CrudAutor::_modificarAutor($datos);