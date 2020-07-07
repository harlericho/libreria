<?php include_once "conexion.php"; //llamamos la base
class CrudStock extends Conexion
{
    static function _listadoStock()
    {
        $sql = "SELECT 
        s.id_parametro,l.titulo,d.nombre,s.stock_min,s.stock_max,s.valor,s.descuento,s.estado
        FROM stocklibro s
        INNER JOIN libro l ON s.id_libro=l.id_libro
        INNER JOIN editorial d ON l.id_editorial=d.id_editorial";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    static function _listadoLibrosEditorial()
    {
        $sql = "SELECT l.id_libro, l.titulo,e.nombre FROM libro l
        INNER JOIN editorial e ON l.id_editorial=e.id_editorial
        LEFT JOIN stocklibro s ON l.id_libro=s.id_libro
        WHERE s.id_libro IS NULL";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //agregamos un stock al libro
    static function _agregarStock($datos)
    {
        $sql = "INSERT INTO stocklibro (stock_min,stock_max,valor,descuento,estado,id_libro) 
        VALUES(:stock_min,:stock_max,:valor,:descuento,:estado,:id_libro)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":stock_min", $datos['stock_min'], PDO::PARAM_INT);
        $query->bindParam(":stock_max", $datos['stock_max'], PDO::PARAM_INT);
        $query->bindParam(":valor", $datos['valor'], PDO::PARAM_STR);
        $query->bindParam(":descuento", $datos['descuento'], PDO::PARAM_INT);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_libro", $datos['id_libro'], PDO::PARAM_INT);
        return $query->execute();
    }

    //modificamos un stock al libro
    static function _modificarStock($datos)
    {
        $sql = "UPDATE stocklibro SET stock_min=:stock_min, stock_max=:stock_max, valor=:valor, descuento=:descuento, estado=:estado WHERE id_parametro=:id_parametro";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":stock_min", $datos['stock_min'], PDO::PARAM_INT);
        $query->bindParam(":stock_max", $datos['stock_max'], PDO::PARAM_INT);
        $query->bindParam(":valor", $datos['valor'], PDO::PARAM_STR);
        $query->bindParam(":descuento", $datos['descuento'], PDO::PARAM_INT);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":id_parametro", $datos['id_parametro'], PDO::PARAM_INT);
        return $query->execute();
    }



    //eliminamos el registro del stock
    static function _eliminarStock($id)
    {
        $sql = "DELETE FROM stocklibro WHERE id_parametro=:id_parametro";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id_parametro", $id, PDO::PARAM_INT);
        return $query->execute();
    }



    //obtenemos el id
    static function _obtenerID($id)
    {
        $sql = "SELECT 
        s.id_parametro,l.titulo,s.stock_min,s.stock_max,s.valor,s.descuento,s.estado
        FROM stocklibro s
        INNER JOIN libro l ON s.id_libro=l.id_libro
        WHERE id_parametro=:id_parametro";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":id_parametro", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
}
