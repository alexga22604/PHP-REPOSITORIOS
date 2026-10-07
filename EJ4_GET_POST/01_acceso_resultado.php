<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4 - Resultado del acceso</title>
</head>
<body>
<?php
$usuarios = array(
    "prueba"   => "1234",
    "abc"  => "abcd",
    "alejandro" => "2004"
);

$nombre = $_POST["nombre"] ? $_POST["nombre"] : "";
$clave  = $_POST["clave"]  ? $_POST["clave"] : "";

if (array_key_exists($nombre, $usuarios) && $usuarios[$nombre] === $clave) {
    echo "<h1>Bienvenido, " . $nombre . "</h1>";
} else {
    echo "<h1>Error</h1>";
    echo "<p>El nombre o la clave no son correctos.</p>";
    echo "<p><a href=\"01.html\">Volver a introducir los datos</a></p>";
}
?>
</body>
</html>