<!DOCTYPE html>
<html lang="en">
<!--7. Crear otro programa que use estos datos  
    y elija dos países al azar indicando sus datos 
    y el  nombre de sus ciudades y un enlace generado
     a google map: 
     ‘https://www.google.es/maps/place/’.$paiselegido
-->
<?php

include("ej6/infopaises.php");
$pais_random = array_rand($paises, 2);

?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ_07</title>
</head>

<body>
    <?php foreach ($pais_random as $pais): ?>
        <h2><?= $pais ?></h2>
        <p>Capital: <?= $paises[$pais]['Capital'] ?></p>
        <p>Población: <?= $paises[$pais]['Poblacion'] ?></p>

        <p>Ciudades:</p>
        <ul>
            <?php foreach ($ciudades[$pais] as $ciudad): ?>
                <li><?= $ciudad ?></li>
            <?php endforeach; ?>
        </ul>

        <?php echo '<a href="https://www.google.es/maps/place/' . $pais . '">https://www.google.es/maps/place/' . $pais . '"</a>'; ?><?php endforeach; ?>
</body>

</html>