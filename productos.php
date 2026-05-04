<?php
require "php/productos.php";
session_start(); // Siempre lo primero, antes de cualquier HTML
$productos = obtenerProductosActivos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Yoku - Productos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<header>
     <!-- Menú Superior (Navegación) -->
        <nav class="menu-superior">
            <div class="logo-superior">
                <img src="img/logos/yoku-negro-sf-cortado.png" alt="Logo de yoku">
                <img src="img/logos/yoku-negro-sf-letras.png" alt="Logo de yoku">
                
            </div>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Personalizaciones</a></li>
            <li><a href="#">Contacto</a></li>

        </ul>
        <div class="botones-menu">
        <button>Carrito</button>
        <button><a href="login.php">Perfil</a></button>

        </div>
        
        </nav>
</header>
<main>
<h1>Nuestros productos</h1>

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
