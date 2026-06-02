<?php
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

require_once BASE_PATH . 'php/funciones/productos.php';

session_start(); // Siempre lo primero, antes de cualquier HTML
$productos = obtenerProductosActivos();
$estilo_especifico = "inicio.css"; //modiifcar archivo
require_once BASE_PATH . 'php/componentes/header.php';
?>

<div class="banner">
    <img src="<?= BASE_URL ?>img/banner-yoku.png">
    <button class="explorar"><a href="<?= BASE_URL ?>public/productos.php">Explorar ahora</a></button>
</div>

<main>
<h1>Secciones</h1>
<section class="secciones">
    <article>
    <img src="<?= BASE_URL ?>img/mujer-seccion.jpg" alt="portada de seccion mujer">
    </article>
    
    <article>
    <img src="<?= BASE_URL ?>img/hombre-seccion.jpg" alt="portada de seccion hombre">

    </article>

    <article>      
    <img src="<?= BASE_URL ?>img/accesorios-seccion.jpg" alt="portada de seccion accesorios">
    </article>
    <article>      
    <img src="<?= BASE_URL ?>img/custom-seccion.jpg" alt="portada de seccion custom">
    </article>
    
</section>

<h2>Nuestros productos</h2>

<div class="productos">

<?php foreach ($productos as $producto): ?>

    <div class="producto">
        <img src="<?= BASE_URL ?>img/productos/<?= $producto['imagen'] ?>" width="200">

        <h3><?= $producto['nombre'] ?></h3>
        <p><?= $producto['descripcion'] ?></p>
        <p><strong><?= $producto['precio'] ?> €</strong></p>
        <div class="acciones-producto">
             <form action="<?= BASE_URL ?>php/procesos/carritoAccion.php" method="POST">
             <button class="boton-producto" type="submit"><img class="add-favorito" src="<?= BASE_URL ?>img/iconos/icono-add-carrito.png" alt="Icono añadir carrito"></button>
       <input type="hidden" name="accion" value="add">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
         </form>
 <?php if (isset($_SESSION['usuario_id'])): ?>
        <a  class="boton-producto" href="<?= BASE_URL ?>php/procesos/listaDeseosAccion.php?accion=add&id=<?= $producto['id'] ?>">
            <img src="<?= BASE_URL ?>img/iconos/icono-favoritos-blanco-i.png" alt="Icono añadir favorito">
        </a>
    <?php else: ?>
        <a class="boton-producto" href="<?= BASE_URL ?>public/login.php"><img src="<?= BASE_URL ?>img/iconos/icono-favoritos-blanco-i.png" alt="Icono añadir favorito"></a>
    <?php endif; ?>
       </div>
    
      
    <a class="boton-producto-texto" href="<?= BASE_URL ?>public/producto.php?id=<?= $producto['id'] ?>">
            Ver producto
        </a>

    
</div>

<?php endforeach; ?>

</div>



<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>
</body>
</html>
