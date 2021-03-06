<?php include_once "conexion.php"; //llamamos la base
class CrudLoginRegistro extends Conexion
{
    // agregamos usuarios
    static function _agregarUsuario($datos)
    {
        $sql = "INSERT INTO usuario (nombres,dni,email,contraseña,estado,id_rol)
        VALUES(:nombres,:dni,:email,:contrasena,:estado,:idrol)";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
        $query->bindParam(":dni", $datos['dni'], PDO::PARAM_STR);
        $query->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $query->bindParam(":contrasena", $datos['pass'], PDO::PARAM_STR);
        $query->bindParam(":estado", $datos['estado'], PDO::PARAM_STR_CHAR);
        $query->bindParam(":idrol", $datos['rol'], PDO::PARAM_INT);
        return $query->execute();
    }
    // no permitir que exista usuarios con el mismo dni 
    static function _validarUsuariosDni($dni)
    {
        $sql = "SELECT * FROM usuario WHERE dni=:dni";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":dni", $dni, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }
    // no permitir que exista usuarios con el mismo email 
    static function _validarUsuariosEmail($email)
    {
        $sql = "SELECT * FROM usuario WHERE email=:email";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }
    // login iniciar
    static function _login($datos)
    {
        $sql = "SELECT * FROM usuario WHERE email=:email AND contraseña=:password";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $query->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
    }

    // obtener los datos del usuario
    static function _obtenerUser($email){
        $sql = "SELECT * FROM usuario WHERE email=:email";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
    }

    //modificamos un datos personales del usuario 
    static function _modificarUsuario($datos)
    {
        $sql = "UPDATE usuario SET nombres=:nombres,direccion=:direccion,fecha_nacimiento=:fecha,telefono=:telefono
        WHERE id_usuario=:id_usuario";
        $query = Conexion::_conectarBD()->prepare($sql);
        $query->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
        $query->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $query->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
        $query->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
        $query->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
        return $query->execute();
    }

}
