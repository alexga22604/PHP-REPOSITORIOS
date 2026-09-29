<!DOCTYPE html>
<html lang="en">
<!-- 9. Realiza un programa que utilice el siguiente
      array con las temperatura medias que ha
      hecho en cada mes de un determinado año y otro array con el nombre de los 
      meses del año. Crea un nuevo array asociativo con el nombre de mes como clave
       y la temperatura como valor. Muestra a continuación un diagrama de barras
    horizontales con esos datos. Las barras del diagrama se pueden dibujar a
    base de la concatenación de una imagen.
-->

<?php
$temperaturas =  [6, 10, 12, 14, 16, 20, 25, 30, 18, 15, 14, 8];
$meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

$mestemperatura = [];
for ($i = 0; $i < count($temperaturas); $i++) {
    $mestemperatura[$meses[$i]] = $temperaturas[$i];
}


function mostrar_tabla($mestemperaturas)
{

    foreach ($mestemperaturas as $mes => $tiempo) {
        echo "<tr>";
        echo "<td>" . $mes . "</td>";
        echo "<td><div style='background-color: green; height: 15px; width: " . ($tiempo * 9) . "px; display: inline-block;'></div> " . $tiempo . "ºC</td>";
        echo "</tr>";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_09</title>
</head>

<body>
    <table border="1">
        <?php mostrar_tabla($mestemperatura);
        ?>
    </table>

</body>

</html>