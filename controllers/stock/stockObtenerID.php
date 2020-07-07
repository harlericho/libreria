<?php include_once "../../data/crudStock.php"; //llamamos al crud
foreach (CrudStock::_obtenerID($_POST['id']) as $key => $value) {
    $datos = array(
        'titulo' => $value['titulo'],
        'stock_min' => $value['stock_min'],
        'stock_max' => $value['stock_max'],
        'valor' => $value['valor'],
        'descuento' => $value['descuento'],
        'estado' => $value['estado'],
        'id_parametro' => $value['id_parametro'],
    );
}
echo json_encode($datos);
