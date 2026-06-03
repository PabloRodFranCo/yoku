<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

require_once BASE_PATH . 'config/db.php';

$titulo_pagina = "Mis pedidos";
$estilo_especifico = "misPedidos.css";

require_once BASE_PATH . 'php/componentes/header.php';

$stmt = $conexion->prepare("
    SELECT *
    FROM pedidos
    WHERE usuario_id = ?
    ORDER BY fecha DESC
");

$stmt->execute([
    $_SESSION['usuario_id']
]);

$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="contenedor-pedidos">

    <h1>Mis pedidos</h1>

    <?php if(empty($pedidos)): ?>

        <div class="sin-pedidos">
            No tienes pedidos realizados.
        </div>

    <?php else: ?>

        <?php foreach($pedidos as $pedido): ?>

            <div class="pedido-card">

                <div class="pedido-header">

                    <div>
                        <strong>Pedido #<?= $pedido['id'] ?></strong>
                    </div>

                    <div>
                        <?= date(
                            'd/m/Y H:i',
                            strtotime($pedido['fecha'])
                        ) ?>
                    </div>

                </div>

                <div class="pedido-info">

                    <p>
                        Estado:
                        <span class="estado">
                            <?= ucfirst($pedido['estado']) ?>
                        </span>
                    </p>

                    <p>
                        Total:
                        <strong>
                            <?= number_format(
                                $pedido['total'],
                                2
                            ) ?> €
                        </strong>
                    </p>

                </div>

                <div class="pedido-acciones">

                    <a
                        href="<?= BASE_URL ?>public/verPedido.php?id=<?= $pedido['id'] ?>"
                        class="btn-pedido"
                    >
                        Ver detalle
                    </a>

                    <?php if(!empty($pedido['recibo_pdf'])): ?>

                        <a
                            href="<?= BASE_URL . $pedido['recibo_pdf'] ?>"
                            target="_blank"
                            class="btn-pedido"
                        >
                            Descargar PDF
                        </a>

                    <?php endif; ?>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</main>

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>