<?php

session_start();

define('BASE_PATH', dirname(__DIR__, 2) . '/');

require_once BASE_PATH . 'config/db.php';
require_once BASE_PATH . 'php/funciones/carritoFunciones.php';
require_once BASE_PATH . 'fpdf/fpdf.php';

if (!isset($_SESSION['usuario_id'])) {

    header('Location: ../login.php');
    exit;
}

$carrito = obtenerCarrito();

if (empty($carrito)) {

    header('Location: ../carrito.php');
    exit;
}

$usuarioId = $_SESSION['usuario_id'];

$total = 0;

foreach ($carrito as $id => $item) {

    if (!empty($item['es_diseno'])) {

        $precio = 19.99;

    } else {

        $stmt = $conexion->prepare("
            SELECT precio
            FROM productos
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        $precio = $producto['precio'];
    }

    $total += $precio * $item['cantidad'];
}

$direccion = 'Pendiente de configurar';

$stmt = $conexion->prepare("
    INSERT INTO pedidos
    (
        usuario_id,
        total,
        direccion_envio,
        estado
    )
    VALUES
    (
        ?,
        ?,
        ?,
        'pagado'
    )
");

$stmt->execute([
    $usuarioId,
    $total,
    $direccion
]);

$pedidoId = $conexion->lastInsertId();

/*
|--------------------------------------------------------------------------
| Guardar productos del pedido
|--------------------------------------------------------------------------
*/

foreach ($carrito as $id => $item) {

    if (!empty($item['es_diseno'])) {

        $productoId = 1; // producto genérico personalizable

        $stmt = $conexion->prepare("
            INSERT INTO pedido_productos
            (
                pedido_id,
                producto_id,
                cantidad,
                precio_unitario,
                texto_personalizado,
                imagen_personalizada
            )
            VALUES
            (
                :pedido_id,
                :producto_id,
                :cantidad,
                :precio,
                :texto,
                :imagen
            )
        ");

        $stmt->execute([
            ':pedido_id' => $pedidoId,
            ':producto_id' => $productoId,
            ':cantidad' => $item['cantidad'],
            ':precio' => 19.99,
            ':texto' => $item['texto'] ?? null,
            ':imagen' => $item['imagen'] ?? null
        ]);

    } else {

        $stmt = $conexion->prepare("
            INSERT INTO pedido_productos
            (
                pedido_id,
                producto_id,
                cantidad,
                precio_unitario
            )
            VALUES
            (
                :pedido_id,
                :producto_id,
                :cantidad,
                :precio
            )
        ");

        $stmtProducto = $conexion->prepare("
            SELECT precio
            FROM productos
            WHERE id = ?
        ");

        $stmtProducto->execute([$id]);

        $producto = $stmtProducto->fetch(PDO::FETCH_ASSOC);

        $precio = $producto['precio'];

        $stmt->execute([
            ':pedido_id' => $pedidoId,
            ':producto_id' => $id,
            ':cantidad' => $item['cantidad'],
            ':precio' => $precio
        ]);
    }
}

/*
|--------------------------------------------------------------------------
| Generar PDF
|--------------------------------------------------------------------------
*/

$pdf = new FPDF();


$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 20);

$pdf->Cell(
    0,
    10,
    'YOKU CLOTHING STORE',
    0,
    1,
    'C'
);

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(
    0,
    8,
    'Pedido #' . $pedidoId,
    0,
    1
);

$pdf->Cell(
    0,
    8,
    'Fecha: ' . date('d/m/Y H:i'),
    0,
    1
);

$pdf->Ln(5);

foreach ($carrito as $id => $item) {

    if (!empty($item['es_diseno'])) {

        $nombre = 'Diseño personalizado';
        $precio = 19.99;

    } else {

        $stmt = $conexion->prepare("
            SELECT nombre, precio
            FROM productos
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        $nombre = $producto['nombre'];
        $precio = $producto['precio'];
    }

    $cantidad = $item['cantidad'];

    $pdf->Cell(
        0,
        8,
        $nombre .
        ' x' .
        $cantidad .
        ' - ' .
        number_format(
            $precio * $cantidad,
            2
        ) .
        ' Euros',
        0,
        1
    );
}

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 11);

$pdf->Cell(
    0,
    10,
    'Gracias por comprar en YOKU',
    0,
    1,
    'C'
);

$directorioRecibos =
    BASE_PATH .
    'uploads/recibos/';

if (!is_dir($directorioRecibos)) {

    mkdir($directorioRecibos, 0777, true);
}

$nombrePdf =
    'pedido_' .
    $pedidoId .
    '.pdf';

$rutaCompleta =
    $directorioRecibos .
    $nombrePdf;

$pdf->Output(
    'F',
    $rutaCompleta
);

$rutaBD =
    'uploads/recibos/' .
    $nombrePdf;

$stmt = $conexion->prepare("
    UPDATE pedidos
    SET recibo_pdf = ?
    WHERE id = ?
");

$stmt->execute([
    $rutaBD,
    $pedidoId
]);

vaciarCarrito();

header(
    'Location: ../pedidoConfirmado.php?id=' .
    $pedidoId
);

exit;