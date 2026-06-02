<?php

define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');
$titulo_pagina= "Yoku - Productos";

require BASE_PATH . 'php/funciones/productos.php';

require BASE_PATH . 'php/componentes/header.php';


$productos = obtenerProductosActivos();


?>


<main>
<h1>Nuestros productos</h1>

<div class="productos">

<?php foreach ($productos as $producto): ?>

    <div class="producto">
        <img src="<?= BASE_URL ?>img/productos/<?= $producto['imagen'] ?>" width="200">

        <h3><?= $producto['nombre'] ?></h3>
        <p><?= $producto['descripcion'] ?></p>
        <p><strong><?= $producto['precio'] ?> €</strong></p>

        <a href="<?= BASE_URL ?>public/producto.php?id=<?= $producto['id'] ?>">
            Ver producto
        </a>
        <form action="<?= BASE_URL ?>procesar/carritoAccion.php" method="POST">
    <input type="hidden" name="accion" value="add">
    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
    <button type="submit">Añadir al carrito</button>
    </form>
        <?php if (isset($_SESSION['usuario_id'])): ?>
    <a href="<?= BASE_URL ?>procesar/listaDeseosAccion.php?accion=add&id=<?= $producto['id'] ?>">
        ❤️ Añadir a favoritos
    </a>
<?php else: ?>
    <a href="<?= BASE_URL ?>public/login.php">❤️ Inicia sesión para guardar</a>
<?php endif; ?>
    </div>

<?php endforeach; ?>

</div>

</main>
<footer class="footer">
    <div class="footer-container">

        <!-- LOGO + RRSS -->
        <div class="footer-col footer-brand">
            <img src="<?= BASE_URL ?>img/logos/yoku-negro-sf.png" alt="Yoku" class="footer-logo">
            <p class="footer-brand-text">YOKU! Clothing Store</p>

            <div class="footer-socials">
                <a href="#"><img src="img/icons/facebook.svg" alt="Facebook"></a>
                <a href="#"><img src="img/icons/linkedin.svg" alt="LinkedIn"></a>
                <a href="#"><img src="img/icons/youtube.svg" alt="YouTube"></a>
                <a href="#"><img src="img/icons/instagram.svg" alt="Instagram"></a>
            </div>
        </div>

        <!-- INICIO -->
        <div class="footer-col">
            <h4>Inicio</h4>
            <ul>
                <li><a href="#">Perfil</a></li>
                <li><a href="#">Carrito compra</a></li>
                <li><a href="#">Pedidos</a></li>
            </ul>
        </div>

        <!-- PERSONALIZACIONES -->
        <div class="footer-col">
            <h4>Personalizaciones</h4>
            <ul>
                <li><a href="#">Personalizar</a></li>
                <li><a href="#">Productos base</a></li>
                <li><a href="#">Información</a></li>
            </ul>
        </div>

        <!-- PRODUCTOS -->
        <div class="footer-col">
            <h4>Productos</h4>
            <ul>
                <li><a href="#">Mujer</a></li>
                <li><a href="#">Hombre</a></li>
                <li><a href="#">Accesorios</a></li>
            </ul>
        </div>

        <!-- CONTACTO -->
        <div class="footer-col">
            <h4>Contacto</h4>
            <ul>
                <li><a href="#">Acerca de nosotros</a></li>
                <li><a href="#">Políticas de seguridad</a></li>
                <li><a href="#">Política de devoluciones</a></li>
            </ul>
        </div>

    </div>
</footer>

</body>
</html>
