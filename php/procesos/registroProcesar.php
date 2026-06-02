<?php
define('BASE_PATH', __DIR__ . '/../');
require_once BASE_PATH . '../php/funciones/usuarios.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

if (obtenerUsuarioPorEmail($email)) {
    die("El email ya existe");
}

crearUsuario($nombre, $email, $password);
header("Location: /yoku/public/login.php");
exit;
?>