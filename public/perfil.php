<?php
session_start();

if(!isset($_SESSION['usuario_id'])){

    header("Location: login.php");
    exit;
}
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

require BASE_PATH . 'php/funciones/productos.php';
require_once BASE_PATH . 'config/db.php';

$stmtFavoritos = $conexion->prepare("
    SELECT
        p.id,
        p.nombre,
        p.precio,
        p.imagen,
        p.categoria
    FROM lista_deseos ld
    INNER JOIN productos p
        ON ld.producto_id = p.id
    WHERE ld.usuario_id = ?
    ORDER BY ld.creado_en DESC
    LIMIT 3
");

$stmtFavoritos->execute([
    $_SESSION['usuario_id']
]);

$favoritos = $stmtFavoritos->fetchAll(PDO::FETCH_ASSOC);
$productos = obtenerProductosActivos();
$titulo_pagina = "Mi Perfil - YOKU";
$estilo_especifico= "perfil.css";
//Incluimos el encabezado
require_once BASE_PATH . 'php/componentes/header.php'; 
?>

<main class="container-perfil">
    <section class="perfil-header">
        <div class="avatar-container">
            <img
                src="<?= BASE_URL ?>img/perfil.jpg"
                alt="Foto de perfil"
                class="avatar-img"
            >
        </div>
        
        <div class="info-usuario">
            <h1>
                <?= htmlspecialchars($_SESSION['nombre'] ?? 'Usuario') ?>
            </h1>
            <p class="desc-label"><?= htmlspecialchars($_SESSION['email'] ?? 'Email no disponible') ?></p>
            
            <nav class="menu-perfil">
                <ul>
                    <li><a href="<?= BASE_URL ?>public/listaDeseos.php">Lista de deseos</a></li>
                    <li><a href="<?= BASE_URL ?>public/misPedidos.php">Consultar pedidos</a></li>
                    <li><a href="<?= BASE_URL ?>public/configurarDatos.php">Configurar datos personales</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="seccion-lista">

        <h2>Lista favoritos</h2>
        <div class="grid-productos-perfil">
            <?php if(empty($favoritos)): ?>
                <p>No tienes productos en favoritos.</p>
            <?php else: ?>
                <?php foreach($favoritos as $favorito): ?>
                    <article class="card-mini">
                        <div class="img-wrapper">
                            <img
                                src="<?= BASE_URL . 'img/productos/'. $favorito['imagen'] ?>"
                                alt="<?= htmlspecialchars($favorito['nombre']) ?>"
                            >
                        </div>
                        <h3>
                            <?= htmlspecialchars($favorito['nombre']) ?>
                        </h3>
                        <p class="subtitulo">
                            <?= ucfirst($favorito['categoria']) ?>
                        </p>
                        <p class="precio">
                            <?= number_format(
                                $favorito['precio'],
                                2,
                                ',',
                                '.'
                            ) ?> €
                        </p>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="btn-container">
            <a
                href="<?= BASE_URL ?>public/listaDeseos.php"
                class="btn-ver-todo"
            >
                Ver todo
            </a>
        </div>
    </section>
</main>

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>

</body>
</html>
