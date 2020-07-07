<?php include_once "conexion.php"; //llamamos la base
class CrudLibros extends Conexion
{
    static function _listadoLibrosGeneral()
    {
        $sql = "SELECT 
        l.id_libro,e.nombre,l.titulo,l.descripcion,l.num_paginas,l.edicion,l.portada,l.ann
        FROM libro l 
        INNER JOIN editorial e ON l.id_editorial=e.id_editorial
        WHERE l.estado='A'";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //agregamos un libro nuevo
    static function _agregarLibro($datos)
    {
        $sql = "INSERT INTO libro (titulo,descripcion,num_paginas,edicion,portada,ann,estado,id_editorial)
        values(:titulo,:descripcion,:num_paginas,:edicion,:portada,:ann,:estado,:id_editorial)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
        $query->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $query->bindParam(":num_paginas", $datos['num_paginas'], PDO::PARAM_INT);
        $query->bindParam(":edicion", $datos['edicion'], PDO::PARAM_STR);
        $query->bindParam(":portada", $datos['portada'], PDO::PARAM_LOB);
        $query->bindParam(":ann", $datos['ann'], PDO::PARAM_INT);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_editorial", $datos['id_editorial'], PDO::PARAM_INT);
        return $query->execute();
    }

    //modificamos un libro sin imagen
    static function _modificarLibroSinImagen($datos)
    {
        $sql = "UPDATE libro SET titulo=:titulo,descripcion=:descripcion,num_paginas=:num_paginas,edicion=:edicion,ann=:ann,estado=:estado,id_editorial=:id_editorial WHERE id_libro=:id_libro";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
        $query->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $query->bindParam(":num_paginas", $datos['num_paginas'], PDO::PARAM_INT);
        $query->bindParam(":edicion", $datos['edicion'], PDO::PARAM_STR);
        $query->bindParam(":ann", $datos['ann'], PDO::PARAM_INT);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_editorial", $datos['id_editorial'], PDO::PARAM_INT);
        $query->bindParam(":id_libro", $datos['id_libro'], PDO::PARAM_INT);
        return $query->execute();
    }

    //modificamos un libro con imagen
    static function _modificarLibroConImagen($datos)
    {
        $sql = "UPDATE libro SET titulo=:titulo,descripcion=:descripcion,num_paginas=:num_paginas,edicion=:edicion,portada=:portada,ann=:ann,estado=:estado,id_editorial=:id_editorial WHERE id_libro=:id_libro";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
        $query->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $query->bindParam(":num_paginas", $datos['num_paginas'], PDO::PARAM_INT);
        $query->bindParam(":edicion", $datos['edicion'], PDO::PARAM_STR);
        $query->bindParam(":portada", $datos['portada'], PDO::PARAM_LOB);
        $query->bindParam(":ann", $datos['ann'], PDO::PARAM_INT);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_editorial", $datos['id_editorial'], PDO::PARAM_INT);
        $query->bindParam(":id_libro", $datos['id_libro'], PDO::PARAM_INT);
        return $query->execute();
    }

    //eliminamos o editamos el estado de un libro 
    static function _eliminarLibro($datos)
    {
        $sql = "UPDATE libro SET estado=:estado WHERE id_libro=:id_libro";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_libro", $datos['id_libro'], PDO::PARAM_INT);
        return $query->execute();
    }

    // no permitir que exista libro-editorial-estado con el mismo nombre
    static function _validarNombreEstadoEditorialLibro($titulo,$estado,$id_editorial)
    {
        $sql = "SELECT * FROM libro WHERE titulo=:titulo AND estado=:estado AND id_editorial=:id_editorial";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $query->bindParam(":estado", $estado, PDO::PARAM_STR);
        $query->bindParam(":id_editorial", $id_editorial, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    //obtenemos el id
    static function _obtenerID($id)
    {
        $sql = "SELECT l.id_libro, e.nombre,
        l.titulo,l.descripcion,l.num_paginas,l.edicion,l.portada,l.ann,l.estado,l.id_editorial
        FROM libro l
        INNER JOIN editorial e ON l.id_editorial=e.id_editorial
        WHERE l.id_libro=:id";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
}