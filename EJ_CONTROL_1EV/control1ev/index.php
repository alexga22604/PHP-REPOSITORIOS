<?php
session_start();

include_once('app/funciones.php');

if (intentosAgotados()) {
  include_once('app/accesobloqueado.php');
} elseif (!empty($_GET['login']) && !empty($_GET['clave'])) {

  if (userOk($_GET['login'], $_GET['clave'])) {
    $_SESSION["intentos"] = 0;

    if (getUserRol($_GET['login']) == "ROL_PROFESOR") {
      $contenido = verNotaTodas($_GET['login']);
    } else {
      $contenido = verNotasAlumno($_GET['login']);
    }
    include_once('app/resultado.php');
  }
  // userOK falso
  else {
    $intentos = registrarFallo();

    if (intentosAgotados()) {
      include_once('app/accesobloqueado.php');
    } else {
      $contenido = "El número de usuario y la contraseña no son válidos <br>Intentos de acceso: $intentos de " . MAX_INTENTOS;
      include_once('app/acceso.php');
    }
  }
} else {
  $contenido = " Introduzca su número de usuario y su contraseña";
  include_once('app/acceso.php');
}
