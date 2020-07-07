<?php include_once "../../data/crudStock.php"; //llamamos al crud

echo CrudStock::_eliminarStock($_POST['txtidstockel']);