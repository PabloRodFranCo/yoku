
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="css/formularios.css">


    <title>Yoku - Registro</title>
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
    <main>
   
    <div class="formularios">
    

<form action="registroProcesar.php" method="POST">
    <h1>Registro</h1>
    <p>Crea una cuenta</p><br>
    <input type="text" name="nombre" required placeholder="Nombre" autofocus><br>
    <input type="email" name="email" required placeholder="Email"><br>
    <input type="password" name="password" required placeholder="Contraseña"><br>
    <button type="submit">Registrarse</button><br>
    <a href="login.php">¿Ya tienes cuenta todavía?</a>
</form>


    </div>


    
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
                <li><a href="personalizaciones.php">Personalizar</a></li>
                <li><a href="productos.php">Productos base</a></li>
                <li><a href="/contacto.php">Información</a></li>
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