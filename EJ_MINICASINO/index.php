<?php
session_start();

$msg = "";
// El cookie de visitas dura un mes
$cookie_expira = time() + (30 * 24 * 60 * 60);
$visitas = $_COOKIE["visitas"] ?? 0;

// Recibo el dinero inicial del formulario de bienvenida -------
if (isset($_POST["cantidadini"]) && (int) $_POST["cantidadini"] > 0) {
  $_SESSION["disponible"] = (int) $_POST["cantidadini"];
}

// Entra en el casino (sesión nueva) --------------------------------
if (! isset($_SESSION["disponible"])) {
  // Solo cuento la visita una vez por sesión
  if (! isset($_SESSION["visita_contada"])) {
    $visitas++;
    setcookie("visitas", $visitas, $cookie_expira);
    $_SESSION["visita_contada"] = true;
  }
  include_once "form_bienvenida.php";
  // No continuo despues de mostrar los formularios
  exit();
}

// Si realiza una apuesta ----------------------------------
if (isset($_POST["apostar"])) {
  $cantidad = (int) ($_POST["cantidad"] ?? 0);
  if ($cantidad <= 0) {
    $msg = "Introduzca una cantidad válida.";
  } elseif ($cantidad > $_SESSION["disponible"]) {
    $msg = "No dispone de esa cantidad. No puede hacer la apuesta.";
  } else {
    $msg = " Resultado de la apuesta: " . procesarApuesta($cantidad, $_SESSION["disponible"], $_POST["apuesta"]);
  }
}

// Leo el saldo despues de procesar la apuesta
$disponible = $_SESSION["disponible"];

// Si abandona o ya no le queda dinero -------------------------
if (isset($_POST["dejar"]) || $_SESSION["disponible"] <= 0) {
  include_once "despedida.php";
  session_destroy();
  exit();
}

// Muestro el formulario si puede seguir apostando
require_once "form_apuesta.php";


/**
 *  FUNCIONES AUXILIARES
 */

function procesarApuesta(int $valorapuesta, int &$saldodisponible, string $apuesta): string
{
  $num_alt = rand(1, 100);
  $resultado = ($num_alt % 2 === 0) ? "PAR" : "IMPAR";
  if ($resultado === $apuesta) {
    $saldodisponible += $valorapuesta;
    return "HAS GANADO, RESULTADO: $resultado ($num_alt)";
  }
  $saldodisponible -= $valorapuesta;
  return "HAS PERDIDO, RESULTADO: $resultado ($num_alt)";
}
