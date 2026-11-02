<?php
session_start();

// Cambiar  visitar --> VALOR DE COOKIE
// Cambiar disponible --> VALOR DE SESSION
if (isset($_POST["cantidadini"]) && $_POST["cantidadini"] > 0) {
  $_SESSION['disponible'] = (int) $_POST["cantidadini"];
}
$visitas = $_COOKIE["visitas"] ?? 0;


// Actualizo el cookie de visitas
$cookie_expira = time() + (30 * 24 * 60 * 60);
// Un mes  

$msg = "";

// Entra en el casino --------------------------------
if (!isset($_SESSION['disponible'])) {

  $visitas++;
  setcookie("visitas", $visitas, $cookie_expira);
  include_once "form_bienvenida.php";
  // No continuo despues de mostrar los formularios
  exit();
}



// Si realiza una apuesta ----------------------------------
// llama a procesar apuesta 
if (isset($_POST["apostar"])) {

  $msg = " Resultado de la apuesta:" . procesarApuesta($_POST["cantidad"], $_SESSION["disponible"], $_POST["apuesta"]);
}
 $disponible = $_SESSION['disponible'];

// Si abandona o ya no le queda dinero -------------------------
if (isset($_POST["dejar"]) || ($_SESSION["disponible"] == 0)) {
  include "despedida.php";
  exit();
}
// Muestro el formulario si puede seguir apostando
if ($_SESSION["disponible"] > 0) {
  require_once  "form_apuesta.php";
}
?>


<?php

/**
 *  FUNCIONES AUXILIARES
 */

function procesarApuesta(int $valorapuesta, int &$saldodisponible, string $apuesta): String
{
  $num_alt = rand(1, 100);
  if ($num_alt % 2 === 0 && $apuesta === "PAR") {
    $msgresultado = "HAS GANADO, RESULTADO: PAR";
    $_SESSION["disponible"] = $saldodisponible + $valorapuesta ;
  } elseif ($num_alt % 2 === 1 && $apuesta === "IMPAR") {
    $msgresultado = "HAS GANADO, RESULTADO: IMPAR";
    $_SESSION["disponible"] = $saldodisponible + $valorapuesta;
  } else {
   $num = $num_alt % 2 === 0 ? "PAR" : "IMPAR";

    $msgresultado = "HAS PERDIDO, RESULTADO:" . $num;
    $_SESSION["disponible"] = $saldodisponible - $valorapuesta;
  }

  return $msgresultado;
}
