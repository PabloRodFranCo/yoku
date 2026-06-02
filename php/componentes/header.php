<?php
 if (!defined('BASE_URL')) {
    define('BASE_URL', '/yoku/');
}
        ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>
        <?php echo isset($titulo_pagina) ? $titulo_pagina : "YOKU - Tienda online";
      
        ?>
    </title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/estilos.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    

    
    <!--Si la variable $estilo_especifico tiene algo, lo cargamos-->
   <?php if (isset($estilo_especifico)): ?>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/<?= $estilo_especifico ?>?v=<?= time() ?>">
<?php endif; ?>

</head>
<body>
<header>
     <!-- Menú Superior (Navegación) -->
    <nav class="menu-superior">
        <div class="logo-superior">
                <img src="<?= BASE_URL ?>img/logos/yoku-negro-sf-cortado.png" alt="Logo de yoku">
                <img src="<?= BASE_URL ?>img/logos/yoku-negro-sf-letras.png" alt="Logo de yoku">
                
            </div>
        <ul>
            <li><a href="<?= BASE_URL ?>public/index.php">Inicio</a></li>
            <li><a href="<?= BASE_URL ?>public/productos.php">Productos</a></li>
            <li><a href="<?= BASE_URL ?>public/personalizaciones.php">Personalizaciones</a></li>
            <li><a href="<?= BASE_URL ?>public/contacto.php">Contacto</a></li>

        </ul>
        <div class="botones-menu">
            <button><a class="iconos" href="<?= BASE_URL ?>public/listaDeseos.php"><img class="iconos" src="<?= BASE_URL ?>img/iconos/icono-favoritos-blanco.jpg" alt="Icono favoritos"></a></button>
            <button><a class="iconos" href="<?= BASE_URL ?>public/carrito.php"><img class="iconos" src="<?= BASE_URL ?>img/iconos/icono-carrito-blanco.png" alt="Icono carrito"></a></button>
            <button><a class="iconos" href="<?= BASE_URL ?>public/login.php"><img class="iconos" src="<?= BASE_URL ?>img/iconos/icono-blanco-bld.png"></a></button>

        </div>
        
        </nav>
</header>