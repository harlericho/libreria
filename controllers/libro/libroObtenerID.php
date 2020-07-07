<?php include_once "../../data/crudLibros.php"; //llamamos al crud
foreach (CrudLibros::_obtenerID($_POST['id']) as $key => $value) {
    $datos = array(
        'id_libro' => $value['id_libro'],
        'titulo' => $value['titulo'],
        'descripcion' => $value['descripcion'],
        'num_paginas' => $value['num_paginas'],
        'edicion' => $value['edicion'],
        'portada' => base64_encode($value['portada']),
        'ann' => $value['ann'],
        'estado' => $value['estado'],
        'id_editorial' => $value['id_editorial'],
        'nombre_editorial' => $value['nombre'],
    );
}
echo json_encode($datos);
