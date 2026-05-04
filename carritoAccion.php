<?php
session_start();
require_once "php/carritoFunciones.php";

if (!isset($_POST['id'])) {
    header("Location: index.php");
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
            "uploads/" . $imagen
        );
    }


agregarAlCarrito($id, $texto, $imagenNombre);
}

if ($_POST['accion'] === 'remove') {
    $id = (int)$_POST['id'];
    quitarDelCarrito($_SESSION['item'][$id]);

}

header("Location: carrito.php");
exit;
?>