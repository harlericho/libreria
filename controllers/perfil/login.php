<?php
include_once "../../data/crudUsuario.php";
include_once "../../data/sha1.php";
session_start();
$datos = array(
    'email' => $_POST['email'],
    'password' => SHA1::_encryptacion($_POST['password']),
);

if (!CrudLoginRegistro::_login($datos)) {
    echo 2;
} else {
    $_SESSION['usuario'] = $_POST['email'];
    echo 1;
}
