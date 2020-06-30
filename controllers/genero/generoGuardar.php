<?php include "../../data/crudGenero.php"; //llamamos al crud
$genero = $_POST['txtnombrege'];
$datos = array(
    'genero' =>  strtoupper($_POST['txtnombrege']),
    'estado' => $_POST['selectestadoge'],
);
if (CrudGenero::_validarNombreGenero($genero)) {
    echo 2;
} else {
    echo CrudGenero::_agregarGenero($datos);
}
