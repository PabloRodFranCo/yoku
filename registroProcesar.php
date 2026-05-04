<?php
require_once "php/usuarios.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

if (obtenerUsuarioPorEmail($email)) {
    die("El email ya existe");
}

crearUsuario($nombre, $email, $password);
header("Location: login.php");
exit;
?>