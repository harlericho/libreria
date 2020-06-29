<?php include "conexion.php";
class CrudPais extends Conexion
{
    static function _listadoPais(){
        $sql="SELECT * FROM pais";
        $query=Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
