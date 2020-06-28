<?php include "conexion.php"; //llamamos la base
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
}
