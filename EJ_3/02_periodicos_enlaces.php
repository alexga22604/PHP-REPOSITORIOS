<!DOCTYPE html>
<html lang="en">
    <!--2.- Crear un array que almacene 5 cadenas con 
    el nombre de periódicos y sus enlaces para acceder.
     El array será asociativo con el nombre del 
     periódico como clave y su URL como valor. 
     Mostrar un lista html con cinco hiperenlaces a la URL de los diarios-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_02</title>

<?php

$medios = [ "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es", "ABC" => "https://www.abc.es", "La Vanguardia" => "https://www.lavanguardia.com",
 "El Confidencial" => "https://www.elconfidencial.com"];


 function mostrarMedios($array_medios) {
    foreach ($array_medios as $nombre => $url) {
        echo "<li><a href='$url'>$nombre</a></li>";
    }
}
?>


</head>

<body>
    <ul>
        <?php
        mostrarMedios($medios);
        ?>
    </ul>
</body>
</html>