<?php
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

session_start(); // Siempre lo primero, antes de cualquier HTML
$titulo_pagina = "Yoku - Registro";
$estilo_especifico= "formularios.css";
//Incluimos el encabezado
require_once BASE_PATH . 'php/componentes/header.php';
?>
    <main>
   
    <div class="formularios">
    

<form action="/yoku/php/procesos/registroProcesar.php" method="POST">
    <h1>Registro</h1>
    <p>Crea una cuenta</p><br>
    <input type="text" name="nombre" required placeholder="Nombre" autofocus><br>
    <input type="email" name="email" required placeholder="Email"><br>
    <input type="password" name="password" required placeholder="Contraseña"><br>
    <button type="submit">Registrarse</button><br>
    <a href="<?= BASE_URL ?>public/login.php">¿Ya tienes cuenta todavía?</a>
</form>


    </div>


    
    </main>
   
<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>

</body>
</html>