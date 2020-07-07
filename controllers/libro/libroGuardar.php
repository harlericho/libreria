<?php include_once "../../data/crudLibros.php"; //llamamos al crud

$cargarImagen = $_FILES['filelib']['tmp_name'];
$mostrarImagen = fopen($cargarImagen, 'rb');
$titulo = strtoupper($_POST['txtnombrelib']);
$estado = 'A';
$id_editorial = $_POST['selecteditlib'];
$datos = array(
    'titulo' => strtoupper($_POST['txtnombrelib']),
    'descripcion' => strtoupper($_POST['txtdescripcionlib']),
    'num_paginas' => $_POST['txtnumpaglib'],
    'edicion' => strtoupper($_POST['txtediccionlib']),
    'portada' => $mostrarImagen,
    'ann' => $_POST['txtannlib'],
    'estado' => $_POST['selectestadolib'],
    'id_editorial' => $_POST['selecteditlib'],
);

if (CrudLibros::_validarNombreEstadoEditorialLibro($titulo, $estado, $id_editorial)) {
    echo 2;
} else {
    echo CrudLibros::_agregarLibro($datos);
}
