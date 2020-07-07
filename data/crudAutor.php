<?php include_once "conexion.php"; //llamamos la base
class CrudAutor extends Conexion
{
    static function _listadoAutor(){
        $sql = "SELECT
        a.id_autor,a.nombre_autor,a.email,a.estado,p.pais
        FROM autor a
        INNER JOIN pais p ON a.id_pais=p.id_pais
        WHERE a.estado='A'";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

     //agregamos un autor nuevo
     static function _agregarAutor($datos)
     {
         $sql = "INSERT INTO autor (nombre_autor,email,estado,id_pais)
         values(:nombre,:email,:estado,:id_pais)";
         $query = Conexion::_conectarBD()->prepare($sql);
         $query->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
         $query->bindParam(":email", $datos['email'], PDO::PARAM_STR);
         $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
         $query->bindParam(":id_pais", $datos['id_pais'], PDO::PARAM_INT);
         return $query->execute();
     }

     //modificamos un autor 
    static function _modificarAutor($datos)
    {
        $sql = "UPDATE autor SET nombre_autor=:nombre,email=:email,estado=:estado,id_pais=:id_pais WHERE id_autor=:id_autor";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $query->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_pais", $datos['id_pais'], PDO::PARAM_INT);
        $query->bindParam(":id_autor", $datos['id_autor'], PDO::PARAM_INT);
        return $query->execute();
    }

    //eliminamos o editamos el estado de un autor 
    static function _eliminarAutor($datos)
    {
        $sql = "UPDATE autor SET estado=:estado WHERE id_autor=:id_autor";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_autor", $datos['id_autor'], PDO::PARAM_INT);
        return $query->execute();
    }

     // no permitir que exista un autor con el mismo nombre
    static function _validarNombreAutor($nombre)
    {
        $sql = "SELECT * FROM autor WHERE nombre_autor=:nombre_autor";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombre_autor", $nombre, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    // no permitir que exista un autor con el mismo email
    static function _validarEmailAutor($email)
    {
        $sql = "SELECT * FROM autor WHERE email=:email";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    //obtenemos el id
    static function _obtenerID($id)
    {
        $sql = "SELECT a.id_autor,a.nombre_autor,a.email,a.estado,a.id_pais
        FROM autor a WHERE a.id_autor=:id";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
 
}
