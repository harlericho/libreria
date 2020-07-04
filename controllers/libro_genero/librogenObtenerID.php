<?php include "../../data/crudLibGen.php"; //llamamos al crud
foreach (CrudLibGen::_obtenerID($_POST['id']) as $key => $value) {
    $datos = array(
        'nombre' => $value['titulo'],
        'id_genero' => $value['id_genero'],
        'genero' => $value['genero'],
        'id_librogenero' => $value['id_librogenero'],
    );
}
echo json_encode($datos);
