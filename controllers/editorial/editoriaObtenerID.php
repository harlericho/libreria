<?php include "../../data/crudEditorial.php"; //llamamos al crud
foreach (CrudEditorial::_obtenerID($_POST['id']) as $key => $value) {
    $datos = array(
        'id_editorial' => $value['id_editorial'],
        'nombre' => $value['nombre'],
        'direccion' => $value['direccion'],
        'email' => $value['email'],
        'estado' => $value['estado'],
        'pais' => $value['id_pais'],
    );
}
echo json_encode($datos);
