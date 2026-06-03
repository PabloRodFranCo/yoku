<?php
require_once __DIR__ . '/../../config/db.php';


/* SOLO productos activos (para la tienda) */
function obtenerProductosActivos() {
    global $conexion;

    $sql = "SELECT * FROM productos WHERE activo = 1";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/* TODOS los productos (para el admin) */
function obtenerTodosProductos() {
    global $conexion;

    $sql = "SELECT * FROM productos";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/* activar / desactivar */
function cambiarEstadoProducto($id) {
    global $conexion;

    $sql = "UPDATE productos
            SET activo = NOT activo
            WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    return $stmt->execute([$id]);
}
function obtenerProductoPorId($id) {
    global $conexion;

    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function actualizarProducto($id, $precio, $permite_personalizacion, $permite_imagen) {
    global $conexion;

    $sql = "UPDATE productos
            SET precio = ?, permite_personalizacion = ?, permite_imagen = ?
            WHERE id = ?";
    $stmt = $conexion->prepare($sql);

    return $stmt->execute([
        $precio,
        $permite_personalizacion,
        $permite_imagen,
        $id
    ]);
}
function obtenerProductosPorCategoria($categoria)
{
    global $conexion;

    $sql = "
        SELECT *
        FROM productos
        WHERE activo = 1
        AND LOWER(categoria) = LOWER(?)
    ";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$categoria]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

