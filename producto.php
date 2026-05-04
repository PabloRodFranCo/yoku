
<?php
require "php/productos.php";
require "php/carritoFunciones.php";


$id = $_GET['id'] ?? null;
if (!$id) {
    die("Producto no encontrado");
}
$producto = obtenerProductoPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $producto['nombre'] ?></title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/detalleProducto.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            <li><a href="productos.php">Productos</a></li>
            <li><a href="personalizaciones.php">Personalizaciones</a></li>
            <li><a href="contacto.php">Contacto</a></li>

        </ul>
        <div class="botones-menu">
        <button>Carrito</button>
        <button><img class="iconos" src="img/iconos/icono-perfil-blanco.png"><a href="login.php">Perfil</a></button>

        </div>
        
        </nav>
</header>


<main class="container-detalle">
    <div class="product-layout">
        
        <section class="product-media">
            <div class="main-image-container">
                <img src="img/productos/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>">
            </div>
        </section>

        <section class="product-info">
            <h1 class="product-title"><?= $producto['nombre'] ?></h1>
            <p class="product-stock">Stock disponible: 10</p>
            <p class="product-price"><?= number_format($producto['precio'], 2) ?> €</p>

            <form action="carritoAccion.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="add">
    <input type="hidden" name="id" value="<?= $producto['id'] ?>">

    <?php if ($producto['permite_personalizacion']): ?>
        <label>Texto personalizado</label>
        <input type="text" name="texto">
    <?php endif; ?>

    <?php if ($producto['permite_imagen']): ?>
        <label>Imagen personalizada</label>
        <input type="file" name="imagen">
    <?php endif; ?>

    <button type="submit">Añadir al carrito</button>
</form>
<a href="listaDeseosAccion.php">❤️ Lista de deseos</a>



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
                <a href="producto.php?id=<?= $rel['id'] ?>">
                    <img src="img/productos/<?= $rel['imagen'] ?>" alt="<?= $rel['nombre'] ?>">
                    <h3><?= $rel['nombre'] ?></h3>
                    <p><?= $rel['precio'] ?> €</p>
                </a>
            </div>
            <?php $count++; endforeach; ?>
        </div>
    </section>
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
