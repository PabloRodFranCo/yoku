<?php
require "php/productos.php";
session_start(); // Siempre lo primero, antes de cualquier HTML
$productos = obtenerProductosActivos();
$estilo_especifico = "inicio.css"; //modiifcar archivo
require_once "php/header.php";
?>

<div class="banner">
    <img src="img/banner-yoku.png">
    <button class="explorar"><a href="productos.php">Explorar ahora</a></button>
</div>

<main>
<h1>Secciones</h1>
<section class="secciones">
    <article>
    <img src="img/mujer-seccion.jpg" alt="portada de seccion mujer">
    </article>
    
    <article>
    <img src="img/hombre-seccion.jpg" alt="portada de seccion hombre">

    </article>

    <article>      
    <img src="img/accesorios-seccion.jpg" alt="portada de seccion accesorios">
    </article>
    <article>      
    <img src="img/custom-seccion.jpg" alt="portada de seccion custom">
    </article>
    
</section>

<h2>Nuestros productos</h2>

<div class="productos">

<?php foreach ($productos as $producto): ?>

    <div class="producto">
        <img src="img/productos/<?= $producto['imagen'] ?>" width="200">

        <h3><?= $producto['nombre'] ?></h3>
        <p><?= $producto['descripcion'] ?></p>
        <p><strong><?= $producto['precio'] ?> €</strong></p>

        <a href="producto.php?id=<?= $producto['id'] ?>">
            Ver producto
        </a>
       <form action="carritoAccion.php" method="POST">
    <input type="hidden" name="accion" value="add">
    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
    <button type="submit">Añadir al carrito</button>
    </form>
    <?php if (isset($_SESSION['usuario_id'])): ?>
    <a href="listaDeseosAccion.php?accion=add&id=<?= $producto['id'] ?>">
        ❤️ Añadir a favoritos
    </a>
<?php else: ?>
    <a href="login.php">❤️ Inicia sesión para guardar</a>
<?php endif; ?>

    </div>

<?php endforeach; ?>

</div>

</main>
<footer class="footer">
    <div class="footer-container">

        <!-- LOGO + RRSS -->
        <div class="footer-col footer-brand">
            <img src="img/logos/yoku-negro-sf.png" alt="Yoku" class="footer-logo">
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
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="carrito.php">Carrito compra</a></li>
                <li><a href="#">Pedidos</a></li>
            </ul>
        </div>

        <!-- PERSONALIZACIONES -->
        <div class="footer-col">
            <h4>Personalizaciones</h4>
            <ul>
                <li><a href="personalizaciones.php">Personalizar</a></li>
                <li><a href="productos.php">Productos base</a></li>
                <li><a href="contacto.php">Información</a></li>
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
                <li><a href="contacto.php">Acerca de nosotros</a></li>
                <li><a href="#">Políticas de seguridad</a></li>
                <li><a href="#">Política de devoluciones</a></li>
            </ul>
        </div>

    </div>
</footer>

</body>
</html>
