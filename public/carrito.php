<?php
session_start();

if(!isset($_SESSION['usuario_id'])){

    header("Location: login.php");
    exit;
}
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');
require_once  BASE_PATH . 'config/db.php';
require_once  BASE_PATH .'php/funciones/carritoFunciones.php';

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
    <img src="<?= BASE_URL ?>uploads/<?= $item['imagen'] ?>" width="80">
<?php endif; ?>

    <td><?= $subtotal ?> €</td>
    <td>
        <a href="<?= BASE_URL ?>procesos/carritoAccion.php?accion=remove&id=<?= $id ?>">❌</a>
    </td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="3"><strong>Total</strong></td>
    <td colspan="2"><strong><?= $total ?> €</strong></td>
</tr>
</table>

<a href="<?= BASE_URL ?>public/checkout.php">Finalizar pedido</a>

<?php endif; ?>
