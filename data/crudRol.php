<?php include "conexion.php";
class CrudRol extends Conexion
{
    static function _listadoRol(){
        $sql="SELECT * FROM rol";
        $query=Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //agregamos un rol nuevo
    static function _agregarRol($datos)
    {
        $sql = "INSERT INTO rol (descripcion,estado)
        values(:descripcion,:estado)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        return $query->execute();
    }

     // no permitir que exista un rol con el mismo nombre
     static function _validarNombreRol($descripcion)
     {
         $sql = "SELECT * FROM rol WHERE descripcion=:descripcion";
         $query = Conexion::_conectarBD()->prepare($sql);
         $query->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
         $query->execute();
         return $query->fetch();
     }
}
