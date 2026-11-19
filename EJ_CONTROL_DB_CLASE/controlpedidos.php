<?php
require_once "Cliente.php";
require_once "Pedido.php";
require_once "modelo/AccesoDatos.php";

if (empty($_GET["nombre"]) || empty($_GET["clave"])) {
    $msgError = "El nombre o la clave estan vacios";
    require_once "vistas/error.php";
    exit();
}

$ac = AccesoDatos::initModelo();
// $numAccesoCliente = $ac -> actualizarAccesoCliente();
$cliente_cod = $ac->getCliente($_GET["nombre"], $_GET["clave"]);
// COOKIE 1) Leo el contador que guardó el navegador.
// Si es la primera visita la cookie no existe y ?? pone 0 (evita el Warning).
$nconsultas = $_COOKIE["consultas"] ?? 0;






if ($cliente_cod == "") {
    $msgError = "Usuarios o contraseñas no encontrados";
    include 'vistas/error.php';
} else {
    $pedidosClientes = $ac->getPedidosCliente($cliente_cod);

    // COOKIE 2) Login correcto: sumo este acceso al contador
    $nconsultas++;

    // COOKIE 3) Guardo el nuevo valor en el navegador
    // setcookie(nombre, valor, caducidad, ruta) -> caduca en 7 días, válida en todo el sitio ("/")
    // OJO: tiene que ir ANTES de cualquier HTML (antes del include), si no da "headers already sent"
    setcookie('consultas', $nconsultas, time() + 3600 * 24 * 7, "/");

    // COOKIE 4) Preparo el mensaje; la vista lo ve porque se crea antes del include
    $msg_cookies = "Ha accedido un total de " . $nconsultas . " veces";

    include 'vistas/listadopedidos.php';
}
