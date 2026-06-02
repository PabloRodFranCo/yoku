<?php
require_once __DIR__ . "/../../config/db.php";

/* buscar usuario por email */
function obtenerUsuarioPorEmail($email) {
    global $conexion;

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/* crear usuario */
function crearUsuario($nombre, $email, $password) {
    global $conexion;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password, rol, creado_en)
            VALUES (?, ?, ?, 'usuario', NOW())";

    $stmt = $conexion->prepare($sql);
    return $stmt->execute([$nombre, $email, $hash]);
}
