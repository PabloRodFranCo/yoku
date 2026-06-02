<?php
session_start();
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

    <?php endif; ?>

</main>

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>
