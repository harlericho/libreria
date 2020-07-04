<?php include "../../data/crudLibGen.php"; //llamamos al crud
$datos = array(
    'id_genero' => $_POST['selectlibgengeneroed'],
    'id_librogenero' => $_POST['txtided'],
);

echo CrudLibGen::_modificarLibGen($datos);
