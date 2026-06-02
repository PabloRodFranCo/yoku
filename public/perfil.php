<?php
session_start();

if(!isset($_SESSION['usuario_id'])){

    header("Location: login.php");
    exit;
}
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

require BASE_PATH . 'php/funciones/productos.php';
$productos = obtenerProductosActivos();
$titulo_pagina = "Mi Perfil - YOKU";
$estilo_especifico= "perfil.css";
//Incluimos el encabezado
require_once BASE_PATH . 'php/componentes/header.php'; 
?>

<main class="container-perfil">
    <section class="perfil-header">
        <div class="avatar-container">
            <div class="avatar-placeholder"></div>
        </div>
        
        <div class="info-usuario">
            <h1>Usuario</h1>
            <p class="desc-label">Descripción</p>
            
            <nav class="menu-perfil">
                <ul>
                    <li><a href="<?= BASE_URL ?>public/listaDeseos.php">Lista de deseos</a></li>
                    <li><a href="#">Consultar pedidos</a></li>
                    <li><a href="#">Configurar datos personales</a></li>
                    <li><a href="#">Configurar cuenta</a></li>
                    <li><a href="#">Privacidad y seguridad</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="seccion-lista">
        <h2>Lista favoritos</h2>
        <div class="grid-productos-perfil">
            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="<?= BASE_URL ?>img/productos/bufanda-beige.jpg" alt="Bufanda">
                </div>
                <h3>Bufanda</h3>
                <p class="subtitulo">Color beige</p>
                <p class="precio">10,99 €</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="<?= BASE_URL ?>img/productos/pant.jpg" alt="Pantalón">
                </div>
                <h3>Pantalón</h3>
                <p class="subtitulo">A rayas</p>
                <p class="precio">10,99 €</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="<?= BASE_URL ?>img/productos/zapas.webp" alt="Zapatos">
                </div>
                <h3>Zapatos</h3>
                <p class="subtitulo">Blancos lisos</p>
                <p class="precio">10,99 €</p>
            </article>
        </div>
        
        <div class="btn-container">
            <a href="<?= BASE_URL ?>public/favoritos.php" class="btn-ver-todo">Ver todo</a>
        </div>
    </section>

    <section class="seccion-lista">
        <h2>Historial</h2>
        <div class="grid-productos-perfil">
            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="<?= BASE_URL ?>img/productos/bufanda-beige.jpg" alt="Bufanda">
                </div>
                <h3>Bufanda</h3>
                <p class="subtitulo">Color beige</p>
                <p class="precio">10,99 €</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="<?= BASE_URL ?>img/productos/falda.webp" alt="Falda">
                </div>
                <h3>Falda</h3>
                <p class="subtitulo">A cuadros</p>
                <p class="precio">10,99 €</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="<?= BASE_URL ?>img/productos/camiseta.webp" alt="Camiseta">
                </div>
                <h3>Camiseta</h3>
                <p class="subtitulo">Color rosa</p>
                <p class="precio">10,99 €</p>
            </article>
        </div>

        <div class="btn-container">
            <a href="<?= BASE_URL ?>public/historial.php" class="btn-ver-todo">Ver todo</a>
        </div>
    </section>
</main>


<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>

</body>
</html>
