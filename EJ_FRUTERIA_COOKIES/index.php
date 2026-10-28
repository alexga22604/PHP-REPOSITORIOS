<?php
session_start();
require_once 'precios.php';

// Manejo de la sesión con dos valores
// 'cliente' => nombre del cliente
// 'pedidos' => array asociativo fruta => cantidad


// Nuevo cliente: anoto en la sesión su nombre y creo su tabla de pedidos vacía
if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $_SESSION['pedidos'] = [];
}

// No hay definido un cliente todavía en la session 
if (!isset($_SESSION['cliente'])) {
    include 'bienvenida.php';
    die();
    }


// Proceso las acciones 
if (isset($_POST["accion"])) {

    switch ($_POST["accion"]) {
        case " Anotar ":
            if (isset($_SESSION['pedidos'][$_POST['fruta']])) {
                $fruta = $_POST['fruta'];
                $cantidad = $_POST['cantidad'];
                //Suma cantidad si ya existe la fruta
                $_SESSION['pedidos'][$fruta] += $cantidad;
              
            }
            else {
                $fruta = $_POST['fruta'];
                $cantidad = $_POST['cantidad'];
                // Creo la tabla de pedidos en la sesión
                $_SESSION['pedidos'][$fruta] = $cantidad;
            }
            break;
        case " Anular ":
            $fruta = $_POST['fruta'];
            // Vacío la tabla de pedidos en la sesión
            unset($_SESSION['pedidos'] [$fruta]);
            break;
        case " Terminar ":
            // Destruyo la sesión y vuelvo a la página de bienvenida
            $compraRealizada = htmlTablaPedidos();
            include_once "despedida.php";
            session_destroy();
            die();
            break;
    }
}

$compraRealizada = htmlTablaPedidos();
require_once 'compra.php';

// Función axiliar que genera una tabla HTML a partir  la tabla de pedidos
// Almacenada en la sesión
function htmlTablaPedidos(): string
{
    global $precios;
    
    $total = 0;
    $msg = "";
    $msg.= "<table>";
    $msg.= "<tr><th>Fruta</th><th>Cantidad</th><th>Precio</th><th>Importe</th></tr>";

    foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
        // Busco el precio de la fruta en la tabla de precios
        $precio = $precios[$fruta];
        $importe = $cantidad * $precio;
        $total += $importe;
        $msg.= "<tr><td>".$fruta. "</td><td>".$cantidad."</td>";
        $msg.= "<td>".$precio." €</td>";
        $msg.= "<td>".$importe." €</td></tr>";
    }
    $msg.= "<tr><td>TOTAL ".$total." €</td></tr>";
    $msg.= "</table>";
    return $msg;
}
