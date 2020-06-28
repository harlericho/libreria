<?php include "conexion.php"; //llamamos la base
class CrudLoginRegistro extends Conexion
{
    // agregamos usuarios
    static function _agregarUsuario($datos)
    {
        $sql = "INSERT INTO usuario (nombres,dni,email,contraseña,estado,id_rol)
        VALUES(:nombres,:dni,:email,:contrasena,:estado,:idrol)";
        $query=Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombres",$datos['nombres'],PDO::PARAM_STR);
        $query->bindParam(":dni",$datos['dni'],PDO::PARAM_STR);
        $query->bindParam(":email",$datos['email'],PDO::PARAM_STR);
        $query->bindParam(":contrasena",$datos['pass'],PDO::PARAM_STR);
        $query->bindParam(":estado",$datos['estado'],PDO::PARAM_STR_CHAR);
        $query->bindParam(":idrol",$datos['rol'],PDO::PARAM_INT);
        return $query->execute();
    }
    // no permitir que exista usuarios con el mismo dni 
    static function _validarUsuariosDni($dni){
        $sql = "SELECT * FROM usuario WHERE dni=:dni";
        $query=Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":dni",$dni,PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }
    // no permitir que exista usuarios con el mismo email 
    static function _validarUsuariosEmail($email){
        $sql = "SELECT * FROM usuario WHERE email=:email";
        $query=Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":email",$email,PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }
}
