<!DOCTYPE html>
<html lang="en">
<!--8. Generar una tabla HTML a partir del 
contenido de los anteriores datos.

Pais	Capital	Población 	Ciudades
España	Madrid	42.000.000	Madrid, 
Barcelona,León,Sevilla, Valencia, Málaga
Francia	..		

-->
<?php
include("ej6/infopaises.php");


function mostrar_tabla($paises, $ciudades)
{
    foreach ($paises as $nombre => $datos) {
        echo "<tr>";
        echo "<td>" . $nombre . "</td>";
        echo "<td>" . $datos["Capital"] . "</td>";
        echo "<td>" . number_format($datos["Poblacion"], 0, ',', '.') . "</td>";
        echo "<td>" . implode(", ", $ciudades[$nombre]) . "</td>";
        echo "</tr>";
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_06</title>
</head>

<body>
    <table border="1">
        <tr>
            <td>País</td>
            <td>Capital</td>
            <td>Población</td>
            <td>Ciudades</td>
        </tr>
        <?php
        mostrar_tabla($paises, $ciudades);
        ?>



    </table>

</body>

</html>