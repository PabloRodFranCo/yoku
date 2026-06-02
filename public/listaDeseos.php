<?php
session_start();

if(!isset($_SESSION['usuario_id'])){

    header("Location: login.php");
    exit;
}
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');
require_once BASE_PATH . 'config/db.php';

if (!isset($_SESSION['usuario_id'])) {
    die("Debes iniciar sesión");
}

$sql = "SELECT p.*
        FROM lista_deseos ld
        JOIN productos p ON ld.producto_id = p.id
        WHERE ld.usuario_id = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$_SESSION['usuario_id']]);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>❤️ Mis favoritos</h1>

<?php if (empty($productos)): ?>
    <p>No tienes productos guardados</p>
<?php else: ?>

<div class="productos">
<?php foreach ($productos as $p): ?>
    <div class="producto">
        <img src="<?= BASE_URL ?>img/productos/<?= $p['imagen'] ?>" width="200">
        <h3><?= $p['nombre'] ?></h3>
        <p><?= $p['precio'] ?> €</p>

        <a href="<?= BASE_URL ?>public/producto.php?id=<?= $p['id'] ?>">Ver producto</a><br>

        <a href="<?= BASE_URL ?>procesar/listaDeseosAccion.php?accion=remove&id=<?= $p['id'] ?>">
            ❌ Quitar de favoritos
        </a>
    </div>
<?php endforeach; ?>
</div>

<?php endif; ?>
