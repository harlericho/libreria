<?php include "../../data/crudEditorial.php"; //llamamos al crud
$nombre = $_POST['txtnombreed'];
$email = $_POST['txtemailed'];
$datos = array(
    'nombre' => $_POST['txtnombreed'],
    'direccion' => $_POST['txtdireccioned'],
    'email' => $_POST['txtemailed'],
    'estado' => $_POST['selectestadoed'],
    'id_pais' => $_POST['selectpaised'],
);
if (CrudEditorial::_validarNombreEditorial($nombre)) {
    echo 2;
} else  if (CrudEditorial::_validarEmailEditorial($email)) {
    echo 3;
} else {
    echo CrudEditorial::_agregarEditorial($datos);
}
