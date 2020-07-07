<?php include_once "../../data/crudUsuario.php"; //llamamos al crud
include "../data/sha1.php "; //llamamos al sha1
$dni = $_POST['txtdni'];
$email = $_POST['txtemail'];

$datos = array(
    'nombres' => $_POST['txtnombres'],
    'dni' => $_POST['txtdni'],
    'email' => $_POST['txtemail'],
    'pass' => SHA1::_encryptacion($_POST['txtpass']),
    'estado' => 'A',
    'rol' => 1,
);
if (CrudLoginRegistro::_validarUsuariosDni($dni)) {
    echo 2;
} else if (CrudLoginRegistro::_validarUsuariosEmail($email)) {
    echo 3;
} else {
    echo CrudLoginRegistro::_agregarUsuario($datos);
}
