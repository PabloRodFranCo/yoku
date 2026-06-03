<?php
session_start();

if(!isset($_SESSION['usuario_id'])){

    header("Location: login.php");
    exit;
}
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');
require_once BASE_PATH . 'config/db.php';
$titulo_pagina = "Favoritos - Yoku";
$estilo_especifico = "listaDeseos.css";
require_once BASE_PATH . 'php/componentes/header.php';

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
<main class="container-favoritos">

    <h1>Mis favoritos</h1>

    <p class="intro-favoritos">
        Aquí puedes guardar tus productos favoritos para comprarlos más tarde.
    </p>

    <?php if (empty($productos)): ?>

        <div class="favoritos-vacio">
            <p>No tienes productos guardados.</p>

            <a href="<?= BASE_URL ?>public/productos.php"
               class="btn-explorar">
                Explorar productos
            </a>
        </div>

    <?php else: ?>

        <div class="productos">
                
<?php foreach ($productos as $producto): ?>

    <div class="producto">
        <img src="<?= BASE_URL ?>img/productos/<?= $producto['imagen'] ?>" width="200">

        <h3><?= $producto['nombre'] ?></h3>
        <p><?= $producto['descripcion'] ?></p>
        <p><strong><?= $producto['precio'] ?> €</strong></p>    
      
    <a class="boton-producto-texto" href="<?= BASE_URL ?>public/producto.php?id=<?= $producto['id'] ?>">
            Ver producto
    </a>
    <a class="boton-producto-texto"
        href="<?= BASE_URL ?>php/procesos/listaDeseosAccion.php?accion=remove&id=<?= $producto['id'] ?>"
        onclick="return confirm('¿Eliminar de favoritos?')"
    >
        Eliminar de favoritos
    </a>
    
        
                    </div>

   <?php endforeach; ?>
    </div>

    <?php endif; ?>

</main>

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>
