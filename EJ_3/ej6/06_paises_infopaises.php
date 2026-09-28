<?php
include "infopaises.php";

$maxPoblacion = 0;
$paisMax = "";

foreach ($paises as $pais => $datos) {
    if ($datos["Poblacion"] > $maxPoblacion) {
        $maxPoblacion = $datos["Poblacion"];
        $paisMax = $pais;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_06</title>
</head>
<body>
    <h1><?php echo $paisMax; ?></h1>
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