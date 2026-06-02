<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('BASE_PATH', dirname(__DIR__, 2) . '/');

require_once BASE_PATH . 'config/db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {

    echo json_encode([
        'ok' => false,
        'mensaje' => 'Debes iniciar sesión'
    ]);

    exit;
}

if (
    !isset($_FILES['imagen']) ||
    $_FILES['imagen']['error'] !== UPLOAD_ERR_OK
) {

    echo json_encode([
        'ok' => false,
        'mensaje' => 'Error al recibir la imagen',
        'debug' => $_FILES
    ]);

    exit;
}

$usuarioId = $_SESSION['usuario_id'];

$texto = $_POST['texto'] ?? '';
$color = $_POST['color'] ?? '#000000';

$imagenX = intval($_POST['imagen_x'] ?? 0);
$imagenY = intval($_POST['imagen_y'] ?? 0);

$textoX = intval($_POST['texto_x'] ?? 0);
$textoY = intval($_POST['texto_y'] ?? 0);

$anchoImagen = intval($_POST['ancho_imagen'] ?? 150);

$directorio = BASE_PATH . 'uploads/disenos/';

if (!is_dir($directorio)) {

    mkdir($directorio, 0777, true);
}

$extension = strtolower(
    pathinfo(
        $_FILES['imagen']['name'],
        PATHINFO_EXTENSION
    )
);

$permitidas = [
    'png',
    'jpg',
    'jpeg',
    'webp'
];

if (!in_array($extension, $permitidas)) {

    echo json_encode([
        'ok' => false,
        'mensaje' => 'Formato no permitido'
    ]);

    exit;
}

$nombreArchivo =
    uniqid('design_') .
    '.' .
    $extension;

$rutaCompleta =
    $directorio .
    $nombreArchivo;

if (
    !move_uploaded_file(
        $_FILES['imagen']['tmp_name'],
        $rutaCompleta
    )
) {

    echo json_encode([
        'ok' => false,
        'mensaje' => 'Error al guardar la imagen'
    ]);

    exit;
}

$rutaBD =
    'uploads/disenos/' .
    $nombreArchivo;

$sql = "
INSERT INTO disenos
(
    usuario_id,
    imagen,
    texto_personalizado,
    color_texto,
    imagen_x,
    imagen_y,
    texto_x,
    texto_y,
    ancho_imagen
)
VALUES
(
    :usuario_id,
    :imagen,
    :texto,
    :color,
    :imagen_x,
    :imagen_y,
    :texto_x,
    :texto_y,
    :ancho_imagen
)
";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ':usuario_id' => $usuarioId,
    ':imagen' => $rutaBD,
    ':texto' => $texto,
    ':color' => $color,
    ':imagen_x' => $imagenX,
    ':imagen_y' => $imagenY,
    ':texto_x' => $textoX,
    ':texto_y' => $textoY,
    ':ancho_imagen' => $anchoImagen
]);

$disenoId = $conexion->lastInsertId();

require_once BASE_PATH . 'php/funciones/carritoFunciones.php';

agregarDisenoAlCarrito(
    $disenoId,
    $texto,
    $rutaBD
);

$_SESSION['ultimo_diseno'] = $disenoId;

echo json_encode([
    'ok' => true,
    'diseno_id' => $disenoId,
    'mensaje' => 'Diseño guardado correctamente'
]);