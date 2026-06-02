<?php
session_start();
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

$titulo_pagina = "Carrito - Yoku";
$estilo_especifico="carrito.css";
require_once  BASE_PATH . 'config/db.php';

require_once  BASE_PATH .'php/funciones/carritoFunciones.php';

$carrito = obtenerCarrito();


require_once BASE_PATH . 'php/componentes/header.php';
?>

<main class="container-carrito">

    <h1>Mi carrito</h1>

    <?php if (empty($carrito)): ?>

        <div class="carrito-vacio">
            <p>Tu carrito está vacío</p>
            <a href="<?= BASE_URL ?>public/productos.php" class="btn-seguir">
                Explorar productos
            </a>
        </div>

    <?php else: ?>

        <div class="carrito-lista">

        <?php
        $total = 0;

        foreach ($carrito as $id => $item):

            $stmt = $conexion->prepare("
                SELECT nombre, precio
                FROM productos
                WHERE id = ?
            ");

            $stmt->execute([$id]);
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            $cantidad = $item['cantidad'];
            $subtotal = $producto['precio'] * $cantidad;

            $total += $subtotal;
        ?>

            <article class="item-carrito">

                <div class="info-producto">

                    <h3><?= $producto['nombre'] ?></h3>

                    <p><strong>Precio:</strong>
                        <?= $producto['precio'] ?> €
                    </p>

                    <p><strong>Cantidad:</strong>
                        <?= $cantidad ?>
                    </p>

                    <?php if (!empty($item['texto'])): ?>
                        <p>
                            <strong>Texto personalizado:</strong>
                            <?= $item['texto'] ?>
                        </p>
                    <?php endif; ?>

                </div>

                <?php if (!empty($item['imagen'])): ?>
                    <div class="preview-diseno">
                        <img src="<?= BASE_URL ?>uploads/<?= $item['imagen'] ?>">
                    </div>
                <?php endif; ?>

                <div class="acciones-carrito">

                    <p class="subtotal">
                        <?= $subtotal ?> €
                    </p>

                    <a class="btn-eliminar"
                       href="<?= BASE_URL ?>php/procesos/carritoAccion.php?accion=remove&id=<?= $id ?>">
                        Eliminar
                    </a>

                </div>

            </article>

        <?php endforeach; ?>

        </div>

        <div class="resumen-carrito">

            <h2>Total: <?= $total ?> €</h2>

            <a class="btn-finalizar"
               href="<?= BASE_URL ?>public/checkout.php">
                Finalizar pedido
            </a>

        </div>

    <?php endif; ?>

</main>
<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>