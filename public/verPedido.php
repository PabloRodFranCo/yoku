<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

require_once BASE_PATH . 'config/db.php';

$idPedido = intval($_GET['id'] ?? 0);

$stmt = $conexion->prepare("
    SELECT *
    FROM pedidos
    WHERE id = ?
    AND usuario_id = ?
");

$stmt->execute([
    $idPedido,
    $_SESSION['usuario_id']
]);

$pedido = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$pedido){
    die("Pedido no encontrado");
}

$stmt = $conexion->prepare("
    SELECT
        pp.*,
        p.nombre,
        p.imagen
    FROM pedido_productos pp
    INNER JOIN productos p
        ON pp.producto_id = p.id
    WHERE pp.pedido_id = ?
");

$stmt->execute([$idPedido]);

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$titulo_pagina = "Detalle pedido";

require_once BASE_PATH . 'php/componentes/header.php';
?>

<main class="detalle-pedido">

    <h1>Pedido #<?= $pedido['id'] ?></h1>

    <p>
        Estado:
        <strong><?= ucfirst($pedido['estado']) ?></strong>
    </p>

    <p>
        Total:
        <strong>
            <?= number_format($pedido['total'],2) ?> €
        </strong>
    </p>

    <div class="lista-productos">

        <?php foreach($productos as $producto): ?>

            <div class="producto-pedido">

                <img
                    src="<?= BASE_URL . $producto['imagen'] ?>"
                    width="120"
                >

                <div>

                    <h3><?= $producto['nombre'] ?></h3>

                    <p>
                        Cantidad:
                        <?= $producto['cantidad'] ?>
                    </p>

                    <p>
                        Precio:
                        <?= number_format(
                            $producto['precio_unitario'],
                            2
                        ) ?> €
                    </p>

                    <?php if(!empty($producto['texto_personalizado'])): ?>

                        <p>
                            Texto:
                            <?= htmlspecialchars(
                                $producto['texto_personalizado']
                            ) ?>
                        </p>

                    <?php endif; ?>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</main>

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>