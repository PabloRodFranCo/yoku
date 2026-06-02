<?php
session_set_cookie_params([
    'lifetime' => 60 * 60 * 24 * 7,
    'path' => '/',
    'httponly' => true
]);
session_start();
define('BASE_PATH', __DIR__ . '/../');
require_once __DIR__ . '/../funciones/usuarios.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$usuario = obtenerUsuarioPorEmail($email);

if (!$usuario) {
    header("Location: /yoku/public/login.php?error=usuario");
    exit;
}

if (!password_verify($password, $usuario['password'])) {
    header("Location: /yoku/public/login.php?error=password");
    exit;
}

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['rol'] = $usuario['rol'];
$_SESSION['nombre'] = $usuario['nombre'];
$_SESSION['email'] = $usuario['email'];

header("Location: /yoku/public/perfil.php");
exit;