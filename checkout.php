<?php
require "php/carritoFunciones.php";

$carrito = obtenerCarrito();

if (empty($carrito)) {
    die("El carrito está vacío");
}
?>

<h1>Finalizar pedido</h1>

<form action="procesarPedido.php" method="POST">

    <label>Dirección de envío</label><br>
    <textarea name="direccion" required></textarea><br><br>

    <label>Método de pago</label><br>
    <select name="metodo_pago">
        <option value="tarjeta">Tarjeta</option>
        <option value="paypal">PayPal</option>
    </select><br><br>

    <button type="submit">Confirmar pedido</button>
</form>
