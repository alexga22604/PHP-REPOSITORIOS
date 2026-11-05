<?php
require_once('dat/datos.php');

define('MAX_INTENTOS', 5);

/**
 *  Suma un intento fallido al contador guardado en la sesión
 *  @return número de intentos fallidos acumulados
 */
function registrarFallo(): int
{
    $_SESSION["intentos"] = ($_SESSION["intentos"] ?? 0) + 1;
    return $_SESSION["intentos"];
}


function intentosAgotados(): bool
{
    return ($_SESSION["intentos"] ?? 0) >= MAX_INTENTOS;
}

/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login, $clave): bool
{
    global $usuarios;

    if (array_key_exists($login, $usuarios)) {
        $passwordGuardada = $usuarios[$login][1];

        if ($clave === $passwordGuardada) {
            $_SESSION["login"] = $usuarios[$login][0];
            $_SESSION["rol"] = $usuarios[$login][2];
            return true;
        }
    }
    return false;
}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login)
{
    global $usuarios;
    if (array_key_exists($login, $usuarios)) {
        if ($usuarios[$login][2] == 100) {
            $_SESSION["rol"] = "PROFESOR/a";
            return "ROL_PROFESOR";
        } else if ($usuarios[$login][2] == 101) {
            $_SESSION["rol"] = "ALUMNO/a";
            return "ROL_ALUMNO";
        }
    }
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotasAlumno($codigo): String
{
    $msg = "";
    global $nombreModulos;
    global $notas;
    global $usuarios;

    if (array_key_exists($codigo, $usuarios)) {
        $msg .= " Bienvenido/a " . $_SESSION["rol"] . " " . $_SESSION["login"];

        $msg .= "<table>";
        $msg .= "<tr><th>Módulo</th><th>Nota</th></tr>";
        for ($i = 0; $i < count($nombreModulos); $i++) {
            $msg .= "<tr><td>" . $nombreModulos[$i] . "</td><td>" . $notas[$codigo][$i] . "</td></tr>";
        }
        $msg .= "</table>";
    } else {
        $msg .= "No hay notas para el usuario " . $_SESSION["login"];
    }


    return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas($codigo): String
{

    $msg = "";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    if (array_key_exists($codigo, $usuarios)) {
        $msg .= " Bienvenido/a " . $_SESSION["rol"] . " " . $_SESSION["login"];

        $msg .= "<table>";
        $msg .= "<tr><th>Nombre</th>";
        for ($i = 0; $i < count($nombreModulos); $i++) {
            $msg .= "<th>" . $nombreModulos[$i] . "</th>";
        }
        $msg .= "</tr>";

        foreach ($usuarios as $codigoAlumno => $datosAlumno) {
            if ($datosAlumno[2] == 101) {
                $msg .= "<tr><td>" . $datosAlumno[0] . "</td>";
                for ($i = 0; $i < count($nombreModulos); $i++) {
                    $msg .= "<td>" . $notas[$codigoAlumno][$i] . "</td>";
                }
                $msg .= "</tr>";
            }
        }
        $msg .= "</table>";
    }


    return $msg;
}
