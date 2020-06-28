<?php include "conexion.php"; //llamamos la base
class CrudEditorial extends Conexion
{
    static function _listadoEditorial()
    {
        $sql = "SELECT * FROM editorial";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
