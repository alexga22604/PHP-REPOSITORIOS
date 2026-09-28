<!DOCTYPE html>
<html lang="en"></html>
<?php
include "infopaises.php";

function comparar($a, $b) {
    return $a["Poblacion"] - $b["Poblacion"];
}

uasort($paises, "comparar");

$datosMax = end($paises);
$paisMax = array_key_last($paises);
$maxPoblacion = $datosMax["Poblacion"];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_06v2</title>
</head>
<body>
    <h2>Países ordenados por población</h2>
    <table border="1">
        <tr>
            <th>País</th>
            <th>Capital</th>
            <th>Población</th>
        </tr>
        <?php
        foreach ($paises as $pais => $datos) {
            echo "<tr>";
            echo "<td>$pais</td>";
            echo "<td>" . $datos["Capital"] . "</td>";
            echo "<td>" . $datos["Poblacion"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>País con más población: <?php echo $paisMax; ?></h2>
    <p>Población: <?php echo $maxPoblacion; ?></p>
    <p>Ciudades:</p>
    <ul>
        <?php
        foreach ($ciudades[$paisMax] as $ciudad) {
            echo "<li>$ciudad</li>";
        }
        ?>
    </ul>
</body>
</html>