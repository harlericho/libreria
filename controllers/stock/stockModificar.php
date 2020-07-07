<?php include_once "../../data/crudStock.php"; //llamamos al crud
$datos = array(
    'stock_min' => $_POST['txtstockmine'],
    'stock_max' => $_POST['txtstockmaxe'],
    'valor' => $_POST['txtstockvalore'],
    'descuento' => $_POST['txtstockdescuentoe'],
    'estado' => $_POST['selectestadostocke'],
    'id_parametro' => $_POST['txtidstock'],
);

echo CrudStock::_modificarStock($datos);
