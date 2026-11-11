<?php
require_once("BiciElectrica.php");

// Leer el fichero csv y devuelve una tabla de bicicletas
function cargarbicis(): array
{
    $fich = @fopen("Bicis.csv", "r");
    if ($fich == false) {
        die("Error al abrir el fichero");
    }
    $tabla = [];

    while ($valor = fgetcsv($fich)) {
        list($id, $cx, $cy, $bat, $op) = $valor;
        $bici = new BiciElectrica($id, $cx, $cy, $bat, $op);
        $tabla[] = $bici;
    }

    return $tabla;
}
// Devuelve una cadena con la tabla html de bicis operativas
function mostrartablabicis($tabla): string
{
    $cadena = "<table><tr><th>Id</th><th>Coord X</th><th>Coord Y</th><th>Bateria</th></tr>";
    foreach ($tabla as $bici) {
        if ($bici->operativa) {
            $cadena .= "<tr><td>" . $bici->id . "</td>";
            $cadena .= "<td>" . $bici->coordx . "</td>";
            $cadena .= "<td>" . $bici->coordy . "</td>";
            $cadena .= "<td>" . $bici->bateria . "%</td></tr>";
        }
    }
    $cadena .= "</table>";

    return $cadena;
}


/**
 * Devuelve la bici con menor distancia a las coordenadas de usuario.
 * @param $tabla - tabla de bicicletas
 * @param $x - Coordenada x de usuario
 * @param $y - Coordenada x de usuario
 * @return bicicleta más cercana o null
 */
function bicimascercana($tabla, $x, $y)
{
    $bicicerca = null;
    $distanciamin = 0;
    foreach ($tabla as $bici) {
        if ($bici->operativa) {
            $distancia = $bici->distancia($x, $y);
            if ($bicicerca == null || $distancia < $distanciamin) {
                $bicicerca = $bici;
                $distanciamin = $distancia;
            }
        }
    }

    return $bicicerca;
}
