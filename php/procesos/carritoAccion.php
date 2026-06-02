<?php
session_start();
define('BASE_PATH', __DIR__ . '/../');
require_once __DIR__ . '/../funciones/carritoFunciones.php';

if (!isset($_POST['id'])) {
    header("Location: /yoku/public/index.php");
    exit;
}

if ($_POST['accion'] === 'add') {
    $id = (int)$_POST['id'];
    $texto = $_POST['texto'] ?? null;
    $imagen = null;
//subida de imagenes
    if (!empty($_FILES['imagen']['name'])) {
        $imagen = time() . "_" . $_FILES['imagen']['name'];
        move_uploaded_file(
            $_FILES['imagen']['tmp_name'],
            BASE_PATH . "uploads/" . $imagen
        );
    }


agregarAlCarrito($id, $texto, $imagen);
}

if ($_POST['accion'] === 'remove') {
    $id = (int)$_POST['id'];
    quitarDelCarrito($_SESSION['item'][$id]);

}

header("Location: /yoku/public/carrito.php");
exit;
?>