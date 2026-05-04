<?php

require "php/productos.php";
session_start(); // Siempre lo primero, antes de cualquier HTML
$productos = obtenerProductosActivos();
$titulo_pagina = "Mi Perfil - YOKU";
$estilo_especifico= "perfil.css";
//Incluimos el encabezado
require_once "php/header.php"; 
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
                    <li><a href="wishlist.php">❤️ Lista de deseos</a></li>
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
                    <img src="img/productos/bufanda-beige.jpg" alt="Bufanda">
                </div>
                <h3>Bufanda</h3>
                <p class="subtitulo">Color beige</p>
                <p class="precio">10,99 $</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="img/productos/pantalon-rayas.jpg" alt="Pantalón">
                </div>
                <h3>Pantalón</h3>
                <p class="subtitulo">A rayas</p>
                <p class="precio">10,99 $</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="img/productos/zapatos-blancos.jpg" alt="Zapatos">
                </div>
                <h3>Zapatos</h3>
                <p class="subtitulo">Blancos lisos</p>
                <p class="precio">10,99 $</p>
            </article>
        </div>
        
        <div class="btn-container">
            <a href="favoritos.php" class="btn-ver-todo">Ver todo</a>
        </div>
    </section>

    <section class="seccion-lista">
        <h2>Historial</h2>
        <div class="grid-productos-perfil">
            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="img/productos/bufanda-beige.jpg" alt="Bufanda">
                </div>
                <h3>Bufanda</h3>
                <p class="subtitulo">Color beige</p>
                <p class="precio">10,99 $</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="img/productos/falda-cuadros.jpg" alt="Falda">
                </div>
                <h3>Falda</h3>
                <p class="subtitulo">A cuadros</p>
                <p class="precio">10,99 $</p>
            </article>

            <article class="card-mini">
                <div class="img-wrapper">
                    <img src="img/productos/camiseta-rosa.jpg" alt="Camiseta">
                </div>
                <h3>Camiseta</h3>
                <p class="subtitulo">Color rosa</p>
                <p class="precio">10,99 $</p>
            </article>
        </div>

        <div class="btn-container">
            <a href="historial.php" class="btn-ver-todo">Ver todo</a>
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
