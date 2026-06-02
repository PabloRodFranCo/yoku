DROP DATABASE IF EXISTS yoku;
CREATE DATABASE yoku CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE yoku;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('usuario','trabajador','admin') DEFAULT 'usuario',
    activo TINYINT(1) DEFAULT 1,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255),
    categoria VARCHAR(100),
    stock INT DEFAULT 0,
    activo TINYINT(1) DEFAULT 1,
    permite_personalizacion TINYINT(1) DEFAULT 0,
    permite_imagen TINYINT(1) DEFAULT 0,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    estado ENUM(
        'pendiente',
        'pagado',
        'enviado',
        'entregado',
        'cancelado'
    ) DEFAULT 'pendiente',
    direccion_envio TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_pedidos_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE CASCADE
);

CREATE TABLE pedido_productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,

    cantidad INT NOT NULL DEFAULT 1,
    precio_unitario DECIMAL(10,2) NOT NULL,

    talla ENUM('S','M','L','XL'),
    color VARCHAR(50),

    texto_personalizado TEXT,
    imagen_personalizada VARCHAR(255),

    CONSTRAINT fk_pp_pedido
        FOREIGN KEY (pedido_id)
        REFERENCES pedidos(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_pp_producto
        FOREIGN KEY (producto_id)
        REFERENCES productos(id)
        ON DELETE CASCADE
);

CREATE TABLE lista_deseos (
    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,
    producto_id INT NOT NULL,

    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    UNIQUE(usuario_id, producto_id),

    CONSTRAINT fk_deseos_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_deseos_producto
        FOREIGN KEY (producto_id)
        REFERENCES productos(id)
        ON DELETE CASCADE
);

CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100),
    email VARCHAR(150) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (
    nombre,
    email,
    password,
    rol
)
VALUES
(
    'Administrador',
    'admin@yoku.com',
    '$2y$10$1rNf0N5wP4J1Q4vK0d0lY.4nZL2i4xK1N7oGv8j8W9wY9vG4f0v0K',
    'admin'
);

INSERT INTO productos (
    nombre,
    descripcion,
    precio,
    imagen,
    categoria,
    stock,
    permite_personalizacion,
    permite_imagen
)
VALUES
(
    'Camiseta Básica Blanca',
    'Camiseta de algodón personalizable',
    19.99,
    'img/productos/camiseta_blanca.jpg',
    'Hombre',
    100,
    1,
    1
),
(
    'Sudadera Negra',
    'Sudadera premium',
    39.99,
    'img/productos/sudadera_negra.jpg',
    'Mujer',
    50,
    1,
    1
),
(
    'Gorra Yoku',
    'Gorra oficial Yoku',
    14.99,
    'img/productos/gorra.jpg',
    'Accesorios',
    75,
    0,
    0
);
CREATE TABLE disenos (
    id INT AUTO_INCREMENT PRIMARY KEY,

    usuario_id INT NOT NULL,
    producto_id INT NULL,

    imagen VARCHAR(255) NOT NULL,

    texto_personalizado TEXT,

    color_texto VARCHAR(20),

    imagen_x INT DEFAULT 0,
    imagen_y INT DEFAULT 0,

    texto_x INT DEFAULT 0,
    texto_y INT DEFAULT 0,

    ancho_imagen INT DEFAULT 150,

    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON DELETE CASCADE,

    FOREIGN KEY (producto_id)
        REFERENCES productos(id)
        ON DELETE SET NULL
);
CREATE TABLE carrito_personalizados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    diseno_id INT NOT NULL,
    cantidad INT DEFAULT 1,

    FOREIGN KEY(usuario_id)
        REFERENCES usuarios(id),

    FOREIGN KEY(diseno_id)
        REFERENCES disenos(id)
);