<?php include_once "../../data/crudLibros.php"; //llamamos al crud

if (($_FILES['filelibed']['name'] == null)) {
    $datos = array(
        'titulo' => strtoupper($_POST['txtnombrelibed']),
        'descripcion' => strtoupper($_POST['txtdescripcionlibed']),
        'num_paginas' => $_POST['txtnumpaglibed'],
        'edicion' => strtoupper($_POST['txtediccionlibed']),
        'ann' => $_POST['txtannlibed'],
        'estado' => $_POST['selectestadolibed'],
        'id_editorial' => $_POST['selecteditlibed'],
        'id_libro' => $_POST['txtided'],
    );
    echo CrudLibros::_modificarLibroSinImagen($datos);
} else {
    $cargarImagen = ($_FILES['filelibed']['tmp_name']);
    $mostrarImagen = fopen($cargarImagen, 'rb');
    $datos = array(
        'titulo' => strtoupper($_POST['txtnombrelibed']),
        'descripcion' => strtoupper($_POST['txtdescripcionlibed']),
        'num_paginas' => $_POST['txtnumpaglibed'],
        'edicion' => strtoupper($_POST['txtediccionlibed']),
        'ann' => $_POST['txtannlibed'],
        'estado' => $_POST['selectestadolibed'],
        'portada' => $mostrarImagen,
        'id_editorial' => $_POST['selecteditlibed'],
        'id_libro' => $_POST['txtided'],
    );
    echo CrudLibros::_modificarLibroConImagen($datos);
}
