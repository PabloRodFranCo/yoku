
<?php
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');
require BASE_PATH . 'php/funciones/productos.php';
require BASE_PATH . 'php/funciones/carritoFunciones.php';

$estilo_especifico='detalleProducto.css';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Producto no encontrado");
}
$producto = obtenerProductoPorId($id);
$productosRelacionados = obtenerProductosPorCategoria(
    $producto['categoria']
);

$titulo_pagina=$producto['nombre'];

require BASE_PATH . 'php/componentes/header.php';

?>



<main class="container-detalle">
    <div class="product-layout">
        
        <section class="product-media">
            <div class="main-image-container">
                <img src="<?= BASE_URL ?>img/productos/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>">
            </div>
                </section>
                <section class="product-info">
                    <h1 class="product-title"><?= $producto['nombre'] ?></h1>
                    <p class="product-stock">Stock disponible: 10</p>
                    <p class="product-price"><?= number_format($producto['precio'], 2) ?> €</p>
                    <div class="acciones-producto-detalle">
                    <form
                        action="<?= BASE_URL ?>php/procesos/carritoAccion.php"
                        method="POST"
                    >
                        <input type="hidden" name="accion" value="add">
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <button
                            class="boton-producto"
                            type="submit"
                        >
                            <img
                                src="<?= BASE_URL ?>img/iconos/icono-add-carrito.png"
                                alt="Añadir carrito"
                            >
                        </button>
                    </form>
                    <?php if(isset($_SESSION['usuario_id'])): ?>
                        <a
                            class="boton-producto"
                            href="<?= BASE_URL ?>php/procesos/listaDeseosAccion.php?accion=add&id=<?= $producto['id'] ?>"
                        >
                            <img
                                src="<?= BASE_URL ?>img/iconos/icono-favoritos-blanco-i.png"
                                alt="Favoritos"
                            >
                        </a>
                    <?php else: ?>
                        <a
                            class="boton-producto"
                            href="<?= BASE_URL ?>public/login.php"
                        >
                            <img
                                src="<?= BASE_URL ?>img/iconos/icono-favoritos-blanco-i.png"
                                alt="Favoritos"
                            >
                        </a>
                    <?php endif; ?>
                </div>
                    <p class="product-description"><?= $producto['descripcion'] ?></p>
                </section>
            </div>

    <section class="related-section">
        <h2>Productos relacionados</h2>
        <div class="related-grid">
            <?php 
            $count = 0;
            foreach ($productosRelacionados as $rel): 
                if($rel['id'] == $id) continue;
                if($count >= 3) break; 
            ?>
            <div class="related-card">
                <a href="<?= BASE_URL ?>public/producto.php?id=<?= $rel['id'] ?>">
                    <img src="<?= BASE_URL ?>img/productos/<?= $rel['imagen'] ?>" alt="<?= $rel['nombre'] ?>">
                    <h3><?= $rel['nombre'] ?></h3>
                    <p><?= $rel['precio'] ?> €</p>
                </a>
            </div>
            <?php $count++; endforeach; ?>
        </div>
    </section>
</main>

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>
</body>
</html>
