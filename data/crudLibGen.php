<?php include "conexion.php";

class CrudLibGen extends Conexion
{
    static function _listadoLibGen()
    {
        $sql = "SELECT
        g.id_librogenero,e.nombre,l.titulo,v.genero
        FROM librogenero g
        INNER JOIN libro l ON g.id_libro=l.id_libro
        INNER JOIN genero v ON g.id_genero=v.id_genero
        INNER JOIN editorial e ON l.id_editorial=e.id_editorial";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    static function _listadoGenero()
    {
        $sql = "SELECT * FROM genero";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    static function _listadoLibros()
    {
        $sql = "SELECT l.id_libro, l.titulo,e.nombre FROM libro l
        INNER JOIN editorial e ON l.id_editorial=e.id_editorial
        LEFT JOIN librogenero g ON l.id_libro=g.id_libro
        WHERE g.id_libro IS null";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    static function _listadoLibros2()
    {
        $sql = "SELECT l.titulo,e.nombre FROM libro l
        INNER JOIN editorial e ON l.id_editorial=e.id_editorial";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //agregamos un autor genero al libro
    static function _agregarLibGen($datos)
    {
        $sql = "INSERT INTO librogenero (id_libro,id_genero)
        values(:id_libro,:id_genero)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id_libro", $datos['id_libro'], PDO::PARAM_INT);
        $query->bindParam(":id_genero", $datos['id_genero'], PDO::PARAM_INT);
        return $query->execute();
    }

    //modificamos un genero al libro 
    static function _modificarLibGen($datos)
    {
        $sql = "UPDATE librogenero SET id_genero=:id_genero WHERE id_librogenero=:id_librogenero";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id_genero", $datos['id_genero'], PDO::PARAM_INT);
        $query->bindParam(":id_librogenero", $datos['id_librogenero'], PDO::PARAM_INT);
        return $query->execute();
    }


    //eliminamos el registro del libro genero
    static function _eliminarLibGen($id)
    {
        $sql = "DELETE FROM librogenero WHERE id_librogenero=:id_librogenero";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id_librogenero", $id, PDO::PARAM_INT);
        return $query->execute();
    }


    //obtenemos el id
    static function _obtenerID($id)
    {
        $sql = "SELECT
        g.id_librogenero,e.nombre,l.titulo,g.id_genero,v.genero
        FROM librogenero g
        INNER JOIN libro l ON g.id_libro=l.id_libro
        INNER JOIN editorial e ON l.id_editorial=e.id_editorial
        INNER JOIN genero v ON g.id_genero=v.id_genero
        WHERE g.id_librogenero=:id_librogenero";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id_librogenero", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
}
