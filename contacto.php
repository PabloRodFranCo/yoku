<?php
require "php/productos.php";
session_start(); // Siempre lo primero, antes de cualquier HTML
$productos = obtenerProductosActivos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>YOKU - Tienda online</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/contacto.css">


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
        <button><a href="carrito.php">Carrito</a></button>
        <button><img class="iconos" src="img/iconos/icono-perfil-blanco.png"><a href="login.php">Perfil</a></button>

        </div>
        
        </nav>
</header>
<!-- cambiar esto-->
<main class="container">
        <section class="about-section">
            <div class="about-content">
                <h1>Acerca de nosotros</h1>
                <p>En Yoku! creemos que la ropa es una forma de expresar quién eres. Por eso nos dedicamos a crear prendas únicas, personalizadas y hechas especialmente para ti. Cada diseño cuenta una historia, y queremos ayudarte a contar la tuya.</p>
                <p>Nuestro objetivo es ofrecerte una experiencia creativa y sencilla, donde puedas transformar una prenda básica en algo totalmente original. Desde camisetas, sudaderas y gorras hasta accesorios, ponemos a tu disposición herramientas intuitivas y materiales de alta calidad para que cada detalle refleje tu estilo.</p>
                <p>Nos apasiona la moda personalizada y el trabajo hecho con dedicación. Cada pedido se prepara cuidadosamente, asegurando acabados impecables y resultados que superan las expectativas.</p>
            </div>
            <div class="about-image">
                <img src="img/interior-tienda.jpg" alt="Interior de la tienda Yoku">
            </div>
        </section>

        <section class="contact-section">
            <h2>Contáctanos</h2>
            <form class="contact-form">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
                </div>
                
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Tu apellido">
                </div>

                <div class="form-group">
                    <label for="email">Dirección de correo electrónico</label>
                    <input type="email" id="email" name="email" placeholder="email@dominio.es">
                </div>

                <div class="form-group">
                    <label for="mensaje">Tu mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5" placeholder="Introduce tu pregunta o mensaje"></textarea>
                </div>

                <button type="submit" class="btn-send">Enviar</button>
            </form>
            <script>
document.querySelector('.contact-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Evita que la página se recargue de golpe
    
    const aviso = document.getElementById('notificacion');
    aviso.classList.add('mostrar'); // Muestra la notificación
    
    // Opcional: limpiar el formulario
    this.reset();
    
    // Opcional: ocultar el mensaje después de 5 segundos
    setTimeout(() => {
        aviso.classList.remove('mostrar');
    }, 5000);
});
</script>
        </section>
        
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
