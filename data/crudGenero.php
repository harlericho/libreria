<?php include "conexion.php";
class CrudGenero extends Conexion
{
    static function _listadoGenero(){
        $sql="SELECT * FROM genero";
        $query=Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //agregamos un genero nuevo
    static function _agregarGenero($datos)
    {
        $sql = "INSERT INTO genero (genero,estado)
        values(:genero,:estado)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":genero", $datos['genero'], PDO::PARAM_STR);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        return $query->execute();
    }

     // no permitir que exista un genero con el mismo nombre
     static function _validarNombreGenero($genero)
     {
         $sql = "SELECT * FROM genero WHERE genero=:genero";
         $query = Conexion::_conectarBD()->prepare($sql);
         $query->bindParam(":genero", $genero, PDO::PARAM_STR);
         $query->execute();
         return $query->fetch();
     }
}
