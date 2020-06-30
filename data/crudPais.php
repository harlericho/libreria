<?php include "conexion.php";
class CrudPais extends Conexion
{
    static function _listadoPais(){
        $sql="SELECT * FROM pais";
        $query=Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //agregamos un pais nuevo
    static function _agregarPais($datos)
    {
        $sql = "INSERT INTO pais (pais,estado)
        values(:pais,:estado)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":pais", $datos['pais'], PDO::PARAM_STR);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        return $query->execute();
    }

     // no permitir que exista un pais con el mismo nombre
     static function _validarNombrePais($pais)
     {
         $sql = "SELECT * FROM pais WHERE pais=:pais";
         $query = Conexion::_conectarBD()->prepare($sql);
         $query->bindParam(":pais", $pais, PDO::PARAM_STR);
         $query->execute();
         return $query->fetch();
     }
}
