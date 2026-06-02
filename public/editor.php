<?php
session_start();

define('BASE_PATH', __DIR__ . '/../');
define('BASE_URL', '/yoku/');

$titulo_pagina = "Editor de Diseño - Yoku";
$estilo_especifico = "editor.css";

require_once BASE_PATH . 'php/componentes/header.php';
?>
<main class="editor-container">
    <h1>Diseña tu camiseta</h1>
    <div class="editor-layout">
        <aside class="panel-herramientas">
            <h3>Imagen</h3>
            <input
                type="file"
                id="imagenInput"
                accept="image/*"
            >
            <hr>
            <h3>Texto</h3>
            <input
                type="text"
                id="textoInput"
                placeholder="Tu texto"
            >
            <input
                type="color"
                id="colorTexto"
                value="#000000"
            >
            <hr>
            <label>Tamaño imagen</label>
            <input
                type="range"
                id="tamanoImagen"
                min="50"
                max="300"
                value="150"
            >
            <button type="button" id="guardarDiseno">
                Guardar diseño
            </button>
        </aside>
        <section class="zona-diseno">
            <div class="camiseta-preview">
                <img
                    src="<?= BASE_URL ?>img/productos/camiseta-basica.jpg"
                    class="camiseta-base"
                    alt="camiseta"
                >
                <img
                    id="previewImagen"
                    class="imagen-personalizada"
                >
                <div id="previewTexto" class="texto-personalizado">
                    Tu texto
                </div>
            </div>
        </section>
    </div>
</main>
<script src="<?= BASE_URL ?>js/editor.js"></script>
</body>
</html>