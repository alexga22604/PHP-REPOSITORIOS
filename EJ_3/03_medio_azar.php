<!DOCTYPE html>
<html lang="en">
<!--3. Elegir a azar uno de los cinco medios y  
mostrar el enlace seleccionado.
El Medio recomendado es:  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_03</title>

    <?php

    $medios = [
        "El Pais" => "https://www.elpais.com",
        "El Mundo" => "https://www.elmundo.es",
        "ABC" => "https://www.abc.es",
        "La Vanguardia" => "https://www.lavanguardia.com",
        "El Confidencial" => "https://www.elconfidencial.com"
    ];


    function mostrarMedioAzar($array_medios)
    {
        $medio_azar = array_rand($array_medios);
        $url = $array_medios[$medio_azar];
        echo "<li>El medio recomendado es: <a href='$url'>$medio_azar</a></li>";
    }
    ?>


</head>

<body>
    <ul>
        <?php
        mostrarMedioAzar($medios);
        ?>
    </ul>
</body>

</html>