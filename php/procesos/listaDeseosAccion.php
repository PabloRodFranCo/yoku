<?php
session_start();
define('BASE_PATH', __DIR__ . '/../');
require_once BASE_PATH . '../config/db.php';

if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión");
}

if (!isset($_GET['accion'], $_GET['id'])) {
    header("Location: /yoku/public/index.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$producto_id = (int)$_GET['id'];

if ($_GET['accion'] === 'add') {

    $sql = "INSERT IGNORE INTO lista_deseos (usuario_id, producto_id)
            VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$usuario_id, $producto_id]);
}

if ($_GET['accion'] === 'remove') {

    $sql = "DELETE FROM lista_deseos
            WHERE usuario_id = ? AND producto_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$usuario_id, $producto_id]);
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
