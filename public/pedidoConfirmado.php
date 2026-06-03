<?php

session_start();

define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

require_once BASE_PATH . 'php/componentes/header.php';

$id = intval($_GET['id'] ?? 0);
?>

<main class="container">

    <h1>Pedido realizado correctamente</h1>

    <p>
        Tu pedido #<?= $id ?> ha sido registrado.
    </p>

    <a href="<?= BASE_URL ?>public/perfil.php">
        Ir a mi perfil
    </a>

</main>