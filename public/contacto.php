<?php
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');
require BASE_PATH . 'php/funciones/productos.php';
session_start(); // Siempre lo primero, antes de cualquier HTML
$productos = obtenerProductosActivos();

$estilo_especifico= "contacto.css";
$titulo_pagina = "Yoku - Contacto";
require_once BASE_PATH . 'php/componentes/header.php';
?>

<main class="container">
        <section class="about-section">
            <div class="about-content">
                <h1>Acerca de nosotros</h1>
                <p>En Yoku! creemos que la ropa es una forma de expresar quién eres. Por eso nos dedicamos a crear prendas únicas, personalizadas y hechas especialmente para ti. Cada diseño cuenta una historia, y queremos ayudarte a contar la tuya.</p>
                <p>Nuestro objetivo es ofrecerte una experiencia creativa y sencilla, donde puedas transformar una prenda básica en algo totalmente original. Desde camisetas, sudaderas y gorras hasta accesorios, ponemos a tu disposición herramientas intuitivas y materiales de alta calidad para que cada detalle refleje tu estilo.</p>
                <p>Nos apasiona la moda personalizada y el trabajo hecho con dedicación. Cada pedido se prepara cuidadosamente, asegurando acabados impecables y resultados que superan las expectativas.</p>
            </div>
            <div class="about-image">
                <img src="<?= BASE_URL ?>img/interior-tienda.jpg" alt="Interior de la tienda Yoku">
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
<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>

</body>
</html>
