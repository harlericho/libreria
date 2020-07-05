<?php include "../../data/crudStock.php"; //llamamos al crud
$datos = array(
    'stock_min' => $_POST['txtstockmin'],
    'stock_max' => $_POST['txtstockmax'],
    'valor' => $_POST['txtstockvalor'],
    'descuento' => $_POST['txtstockdescuento'],
    'estado' => $_POST['selectestadostock'],
    'id_libro' => $_POST['selectstocklib'],
);


echo CrudStock::_agregarStock($datos);
