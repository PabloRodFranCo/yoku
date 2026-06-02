<?php

session_start(); // Siempre lo primero, antes de cualquier HTML
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');
require BASE_PATH . 'php/funciones/productos.php';
$titulo_pagina = "Personalizaciones - Yoku";
$estilo_especifico = "personalizaciones.css";
require_once BASE_PATH . 'php/componentes/header.php';
$productos = obtenerProductosActivos();

?>


<main class="container-personalizar">
    <section class="hero-personalizar">
        <h1>Personalizaciones</h1>
        <p class="intro-text">
            ¿Quieres sentir la emoción de llevar una prenda totalmente personalizada? Nosotros te ayudamos a crearla...
            También te podemos ayudar a personalizar tu prenda con nuestros propios diseños y tú los personalizas a tu gusto.
        </p>

        <div class="banner-interactivo">
            <img src="<?= BASE_URL ?>img/chaqueta-personalizada.avif" alt="Chaqueta personalizada">
            <a href="<?= BASE_URL ?>public/editor.php" class="btn-personaliza-aqui">Personaliza aquí</a>
        </div>
    </section>

    <section class="instrucciones">
        <p>Si es la primera vez diseñando en nuestra página no te preocupes, te guiamos paso a paso...</p>
        
        <div class="lista-pasos">
            <p><strong>Primer paso:</strong> Entra en "Personaliza aquí" y selecciona la prenda...</p>
            <p><strong>Segundo paso:</strong> Diseñar la prenda, te proporcionamos las herramientas necesarias...</p>
            <p><strong>Tercer paso:</strong> Una vez tengas tu diseño completamente listo haz clic en el botón guardar...</p>
            <p><strong>Cuarto paso:</strong> Proporciona tus datos personales y dirección para realizar el pago...</p>
        </div>

        <div class="ilustracion-proceso">
            <img src="<?= BASE_URL ?>img/diseño-camiseta.jpg" alt="Proceso de diseño">
        </div>

        <p class="final-text">
            En nuestra plataforma puedes dejar volar tu creatividad y reflejar tu estilo en cada prenda...
            Podrás elegir entre una amplia variedad de colores, estilos y materiales...
        </p>
    </section>

    <section class="productos-base">
        <h2>Productos bases a personalizar</h2>
        <div class="grid-bases">
            <article class="card-base">
                <img src="<?= BASE_URL ?>img/productos/camsieta-basica-negro.jpg" alt="Camiseta">
                <h3>Camiseta</h3>
                <p>Disponible en otros colores</p>
            </article>

            <article class="card-base">
                <img src="<?= BASE_URL ?>img/productos/bufanda-beige.jpg" alt="Bufanda">
                <h3>Bufanda</h3>
                <p>Disponible en otros colores</p>
            </article>

            <article class="card-base">
                <img src="<?= BASE_URL ?>img/productos/pantalon-blanco.jpg" alt="Pantalón">
                <h3>Pantalón</h3>
                <p>Disponible en otros colores</p>
            </article>
        </div>
    </section>
</main>


<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>

</body>
</html>
