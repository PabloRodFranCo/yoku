<?php
session_start();
define('BASE_PATH', __DIR__ . '/../');
require_once __DIR__ . '/../funciones/usuarios.php';

$email = $_POST['email'];
$password = $_POST['password'];

$usuario = obtenerUsuarioPorEmail($email);

if (!$usuario || !password_verify($password, $usuario['password'])) {
    die("Credenciales incorrectas");
}

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['rol'] = $usuario['rol'];
$_SESSION['nombre'] = $usuario['nombre'];

header("Location: /yoku/public/perfil.php");
exit;
