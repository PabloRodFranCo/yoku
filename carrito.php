<?php
session_start();
require_once "config/db.php";
require_once "php/carritoFunciones.php";

$carrito = obtenerCarrito();

?>

<h1>Mi carrito</h1>

<?php if (empty($carrito)): ?>
    <p>El carrito está vacío</p>
<?php else: ?>

<table border="1" cellpadding="8">
<tr>
    <th>Producto</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Total</th>
    <th></th>
</tr>

<?php
$total = 0;
foreach ($carrito as $id => $item):
    $stmt = $conexion->prepare("SELECT nombre, precio FROM productos WHERE id = ?");
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

   $cantidad = $item['cantidad'];
$subtotal = $producto['precio'] * $cantidad;

?>
<tr>
    <td><?= $producto['nombre'] ?></td>
    <td><?= $producto['precio'] ?> €</td>
    <td><?= $cantidad ?></td>

    <p><strong>Texto:</strong> <?= $item['texto'] ?? '—' ?></p>

<?php if ($item['imagen']): ?>
    <img src="uploads/<?= $item['imagen'] ?>" width="80">
<?php endif; ?>

    <td><?= $subtotal ?> €</td>
    <td>
        <a href="carritoAccion.php?accion=remove&id=<?= $id ?>">❌</a>
    </td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="3"><strong>Total</strong></td>
    <td colspan="2"><strong><?= $total ?> €</strong></td>
</tr>
</table>

<a href="checkout.php">Finalizar pedido</a>

<?php endif; ?>
