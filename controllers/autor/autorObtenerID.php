<?php include_once "../../data/crudAutor.php"; //llamamos al crud
foreach (CrudAutor::_obtenerID($_POST['id']) as $key => $value) {
    $datos = array(
        'id_autor' => $value['id_autor'],
        'nombre' => $value['nombre_autor'],
        'email' => $value['email'],
        'estado' => $value['estado'],
        'pais' => $value['id_pais'],
    );
}
echo json_encode($datos);