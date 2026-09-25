<!DOCTYPE html>
<html lang="en">

<!--  Crear una carpeta que se llame img y 
      copiar en ella 5 ficheros de imágenes que
       muestre el logo de un deporte. Crear 
       una array asociativo que almacene como 
       clave el nombre del deporte y como valor la 
       dirección de la imagen.
    Mostrar una tabla HTML donde con el siguiente formato:
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3_04</title>

    <?php 
    $deportes = [
        "Futbol" => "img_ej4/futbol.jpg",
        "Baloncesto" => "img_ej4/basket.jpeg",
        "Tenis" => "img_ej4/tenis.png",
        "Golf" => "img_ej4/golfimages.png",
        "Baseball" => "img_ej4/baseball.jpeg"
    ];
    
    function mostrarDeportes($deportes) {
        echo "<table border='1'>";
        echo "<tr><th>Deporte</th><th>Logo</th></tr>";
        foreach ($deportes as $nombre => $imagen) {
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td><img src='$imagen' alt='$nombre' width='100'></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
   
    ?>
</head>

<body>

    <?php
        mostrarDeportes($deportes);
    ?>

</body>

</html>