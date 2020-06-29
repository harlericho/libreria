<?php include "conexion.php"; //llamamos la base
class CrudEditorial extends Conexion
{
    //listado del editorial
    static function _listadoEditorial()
    {
        $sql = "SELECT
        e.id_editorial,e.nombre,e.direccion,e.email,e.estado,p.pais
        FROM editorial e 
        INNER JOIN pais p ON e.id_pais=p.id_pais
        WHERE e.estado='A'";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //agregamos un editorial nuevo
    static function _agregarEditorial($datos)
    {
        $sql = "INSERT INTO editorial (nombre,direccion,email,estado,id_pais)
        values(:nombre,:direccion,:email,:estado,:id_pais)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $query->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $query->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_pais", $datos['id_pais'], PDO::PARAM_INT);
        return $query->execute();
    }

    //eliminamos o editamos el estado de un editorial 
    static function _eliminarEditorial($datos)
    {
        $sql = "UPDATE editorial SET estado=:estado WHERE id_editorial=:id_editorial";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_editorial", $datos['id_editorial'], PDO::PARAM_INT);
        return $query->execute();
    }

    //modificamos un editorial 
    static function _modificarEditorial($datos)
    {
        $sql = "UPDATE editorial SET nombre=:nombre,direccion=:direccion,email=:email,estado=:estado,id_pais=:id_pais WHERE id_editorial=:id_editorial";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $query->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $query->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_pais", $datos['id_pais'], PDO::PARAM_INT);
        $query->bindParam(":id_editorial", $datos['id_editorial'], PDO::PARAM_INT);
        return $query->execute();
    }

    // no permitir que exista editoriales con el mismo nombre
    static function _validarNombreEditorial($nombre)
    {
        $sql = "SELECT * FROM editorial WHERE nombre=:nombre";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    // no permitir que exista editoriales con el mismo email
    static function _validarEmailEditorial($email)
    {
        $sql = "SELECT * FROM editorial WHERE email=:email";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    //obtenemos el id
    static function _obtenerID($id)
    {
        $sql = "SELECT e.id_editorial,e.nombre,e.direccion,e.email,e.estado,e.id_pais
        FROM editorial e WHERE e.id_editorial=:id";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
}
