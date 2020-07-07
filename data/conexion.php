<?php
class Conexion
{
    static function _conectarBD()
    {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=_libreria", "charlie", "charlie");
            return $conexion;
        } catch (\Throwable $th) {
            die("Fallo de conexion a la base" . $th->getMessage());
        }
    }
}
