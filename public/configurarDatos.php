<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

require_once BASE_PATH . 'config/db.php';

$stmt = $conexion->prepare("
    SELECT id,nombre,email,rol
    FROM usuarios
    WHERE id = ?
");

$stmt->execute([
    $_SESSION['usuario_id']
]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$titulo_pagina = "Configurar datos";
$estilo_especifico = "configurarDatos.css";

require_once BASE_PATH . 'php/componentes/header.php';
?>

<main class="config-container">

    <h1>Mis datos personales</h1>

    <form
        action="<?= BASE_URL ?>public/procesos/actualizarDatos.php"
        method="POST"
        class="form-config"
    >

        <label>Nombre</label>

        <input
            type="text"
            name="nombre"
            required
            value="<?= htmlspecialchars($usuario['nombre']) ?>"
        >

        <label>Email</label>

        <input
            type="email"
            name="email"
            required
            value="<?= htmlspecialchars($usuario['email']) ?>"
        >

        <label>Rol</label>

        <input
            type="text"
            value="<?= ucfirst($usuario['rol']) ?>"
            disabled
        >

        <label>Nueva contraseña</label>

        <input
            type="password"
            name="password"
            placeholder="Dejar vacío para no cambiar"
        >

        <label>Confirmar contraseña</label>

        <input
            type="password"
            name="password2"
            placeholder="Repetir contraseña"
        >

        <button type="submit">
            Guardar cambios
        </button>

    </form>

</main>

<?php require_once BASE_PATH . 'php/componentes/footer.php'; ?>