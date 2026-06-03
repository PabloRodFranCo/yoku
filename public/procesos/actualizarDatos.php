<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

define('BASE_PATH', dirname(__DIR__, 2) . '/');

require_once BASE_PATH . 'config/db.php';

$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);

$password = $_POST['password'] ?? '';
$password2 = $_POST['password2'] ?? '';

$usuarioId = $_SESSION['usuario_id'];

$stmt = $conexion->prepare("
    SELECT id
    FROM usuarios
    WHERE email = ?
    AND id != ?
");

$stmt->execute([
    $email,
    $usuarioId
]);

if ($stmt->fetch()) {

    die("Ese email ya está en uso");
}

if (!empty($password)) {

    if ($password !== $password2) {

        die("Las contraseñas no coinciden");
    }

    $hash = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $stmt = $conexion->prepare("
        UPDATE usuarios
        SET
            nombre = ?,
            email = ?,
            password = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $nombre,
        $email,
        $hash,
        $usuarioId
    ]);

} else {

    $stmt = $conexion->prepare("
        UPDATE usuarios
        SET
            nombre = ?,
            email = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $nombre,
        $email,
        $usuarioId
    ]);
}

$_SESSION['usuario_nombre'] = $nombre;

header(
    "Location: ../configurarDatos.php?ok=1"
);

exit;