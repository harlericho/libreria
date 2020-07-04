<?php include "../../data/crudLibGen.php"; //llamamos al crud
$datos = array(
    'id_libro' => $_POST['selectlibgenlibro'],
    'id_genero' => $_POST['selectlibgengenero'],
);

echo CrudLibGen::_agregarLibGen($datos);
