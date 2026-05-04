
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Yoku - Inicia sesión</title>
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
    <main>
   
    <div class="formularios">
           
    
    <form  action="loginProcesar.php" method="POST">
          <h1>Iniciar sesión</h1>
        <p>Introduzca sus datos de acceso</p><br>
        <input type="email" name="email" required placeholder="Email" autofocus><br>
        <input type="password" name="password" required placeholder="Contraseña"><br>
            <button type="submit">Iniciar sesión</button>
            <br>
            <a href="registro.php">¿No tienes cuenta todavía?</a>
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