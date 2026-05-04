<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión para hacer un pedido");
}

require_once "config/db.php";
require_once "php/carritoFunciones.php";

$carrito = obtenerCarrito();

if (empty($carrito)) {
    die("El carrito está vacío");
}

$direccion = $_POST['direccion'];
$usuario_id = $_SESSION['usuario_id'];

$total = 0;

/* Calcular total */
foreach ($carrito as $id => $item) {

    $stmt = $conexion->prepare("SELECT precio FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    $subtotal = $producto['precio'] * $item['cantidad'];
    $total += $subtotal;
}

/* Crear pedido */
$sql = "INSERT INTO pedidos (usuario_id, total, estado, fecha, direccion_envio)
        VALUES (?, ?, 'pendiente', NOW(), ?)";
$stmt = $conexion->prepare($sql);
$stmt->execute([$usuario_id, $total, $direccion]);

$pedido_id = $conexion->lastInsertId();

/* Productos del pedido */
foreach ($carrito as $id => $item) {

    $stmt = $conexion->prepare("SELECT precio FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "INSERT INTO pedido_productos
            (pedido_id, producto_id, cantidad, precio, texto_personalizado, imagen_personalizada)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt->execute([
        $pedido_id,
        $id,
        $item['cantidad'],
        $producto['precio'],
        $item['texto'],
        $item['imagen']
    ]);
}

/* Vaciar carrito */
vaciarCarrito();

/*Redirigir */
header("Location: pedidoConfirmado.php?id=" . $pedido_id);
exit;
