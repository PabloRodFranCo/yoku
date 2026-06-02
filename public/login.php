<?php  
define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

$estilo_especifico= "formularios.css";
$titulo_pagina = "Yoku - Inicia sesión";
require_once BASE_PATH . 'php/componentes/header.php';
?>
    <main>
   
    <div class="formularios">
           
    
    <form  action="<?= BASE_URL ?>php/procesos/loginProcesar.php" method="POST">
          <h1>Iniciar sesión</h1>
        <p>Introduzca sus datos de acceso</p><br>
        <input type="email" name="email" required placeholder="Email" autofocus><br>
        <input type="password" name="password" required placeholder="Contraseña"><br>
            <button type="submit">Iniciar sesión</button>
            <br>
            <a href="<?= BASE_URL ?>public/registro.php">¿No tienes cuenta todavía?</a>
    </form>

    </div>
    </main>
   

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>
