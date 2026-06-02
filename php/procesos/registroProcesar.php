<?php
define('BASE_PATH', __DIR__ . '/../');
require_once BASE_PATH . '../php/funciones/usuarios.php';

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$nombre || !$email || !$password) {

    header("Location: /yoku/public/registro.php?error=campos");
    exit;
}

if (obtenerUsuarioPorEmail($email)) {

    header("Location: /yoku/public/registro.php?error=email");
    exit;
}

crearUsuario($nombre, $email, $password);

$usuario = obtenerUsuarioPorEmail($email);

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['rol'] = $usuario['rol'];
$_SESSION['nombre'] = $usuario['nombre'];

header("Location: /yoku/public/perfil.php");
exit;