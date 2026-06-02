
<?php
        if (!defined('BASE_URL')) {
    define('BASE_URL', '/yoku/');
}
        ?>

<footer class="footer">
    <div class="footer-container">

        <!-- LOGO + RRSS -->
        <div class="footer-col footer-brand">
            <a href="<?=BASE_URL ?>public/index.php">
            <img src="<?= BASE_URL ?>img/logos/yoku-negro-sf.png" alt="Yoku" class="footer-logo">
            </a>
            <p class="footer-brand-text">YOKU! Clothing Store</p>

            <div class="footer-socials">
                <a href="https://facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                <a href="https://youtube.com/"><i class="fab fa-youtube"></i></a>
                <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
               
            </div>
        </div>

        <!-- INICIO -->
        <div class="footer-col">
            <h4>Inicio</h4>
            <ul>
                <li><a href="<?= BASE_URL ?>public/perfil.php">Perfil</a></li>
                <li><a href="<?= BASE_URL ?>public/carrito.php">Carrito compra</a></li>
                <li><a href="<?= BASE_URL ?>public/listaDeseos.php">Lista de deseos</a></li>

            </ul>
        </div>

        <!-- PERSONALIZACIONES -->
        <div class="footer-col">
            <h4>Personalizaciones</h4>
            <ul>
                <li><a href="<?= BASE_URL ?>public/personalizaciones.php">Personalizar</a></li>
                <li><a href="<?= BASE_URL ?>public/productos.php">Productos base</a></li>
                <li><a href="<?= BASE_URL ?>public/contacto.php">Información</a></li>
            </ul>
        </div>

        <!-- PRODUCTOS -->
        <div class="footer-col">
            <h4>Productos</h4>
            <ul>
                <li><a href="<?= BASE_URL ?>public/productos.php">Mujer</a></li>
                <li><a href="<?= BASE_URL ?>public/productos.php">Hombre</a></li>
                <li><a href="<?= BASE_URL ?>public/productos.php">Accesorios</a></li>
            </ul>
        </div>

        <!-- CONTACTO -->
        <div class="footer-col">
            <h4>Contacto</h4>
            <ul>
                <li><a href="<?=BASE_URL?>public/contacto.php">Acerca de nosotros</a></li>
            </ul>
        </div>

    </div>
</footer>
