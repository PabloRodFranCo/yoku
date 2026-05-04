<?php
require "php/productos.php";
session_start(); // Siempre lo primero, antes de cualquier HTML
$productos = obtenerProductosActivos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personalizaciones - Yoku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/personalizaciones.css">

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

<main class="container-personalizar">
    <section class="hero-personalizar">
        <h1>Personalizaciones</h1>
        <p class="intro-text">
            ¿Quieres sentir la emoción de llevar una prenda totalmente personalizada? Nosotros te ayudamos a crearla...
            También te podemos ayudar a personalizar tu prenda con nuestros propios diseños y tú los personalizas a tu gusto.
        </p>

        <div class="banner-interactivo">
            <img src="img/chaqueta-personalizada.jpg" alt="Chaqueta personalizada">
            <a href="editor.php" class="btn-personaliza-aqui">Personaliza aquí</a>
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
            <img src="img/grafico-diseno.png" alt="Proceso de diseño">
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
                <img src="img/productos/camiseta-negra.jpg" alt="Camiseta">
                <h3>Camiseta</h3>
                <p>Disponible en otros colores</p>
            </article>

            <article class="card-base">
                <img src="img/productos/bufanda-beige.jpg" alt="Bufanda">
                <h3>Bufanda</h3>
                <p>Disponible en otros colores</p>
            </article>

            <article class="card-base">
                <img src="img/productos/pantalon-blanco.jpg" alt="Pantalón">
                <h3>Pantalón</h3>
                <p>Disponible en otros colores</p>
            </article>
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
