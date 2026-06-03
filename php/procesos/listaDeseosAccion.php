<?php

session_start();

define('BASE_PATH', dirname(__DIR__, 2) . '/');

require_once BASE_PATH . 'config/db.php';

if (!isset($_SESSION['usuario_id'])) {

    header('Location: ../../public/login.php');
    exit;
}

$usuarioId = $_SESSION['usuario_id'];

$accion = $_GET['accion'] ?? '';
$productoId = intval($_GET['id'] ?? 0);

if (!$productoId) {

    header('Location: ../../public/listaDeseos.php');
    exit;
}

if ($accion === 'add') {

    $sql = "
        INSERT IGNORE INTO lista_deseos
        (usuario_id, producto_id)
        VALUES (?, ?)
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$usuarioId, $productoId]);

}

if ($accion === 'remove') {

    $sql = "
        DELETE FROM lista_deseos
        WHERE usuario_id = ?
        AND producto_id = ?
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$usuarioId, $productoId]);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;