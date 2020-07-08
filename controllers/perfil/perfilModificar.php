<?php include_once "../../data/crudUsuario.php"; //llamamos al crud

$datos = array(
    'nombres' =>  $_POST['nombreusu'],
    'direccion' =>  $_POST['direccionusu'],
    'fecha' => date("Y-m-d H:i:s", strtotime($_POST['fechanacusu'])),
    'telefono' =>  $_POST['telefonousu'],
    'id_usuario' => $_POST['txtid'],
);

echo CrudLoginRegistro::_modificarUsuario($datos);
