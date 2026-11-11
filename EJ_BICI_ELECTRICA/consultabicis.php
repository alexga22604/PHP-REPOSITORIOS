<?php
require_once("funciones.php");
$tabla = cargarbicis();

if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
    $biciRecomendada = bicimascercana($tabla, $_GET['coordx'], $_GET['coordy']);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>MOSTRAR BICIS OPERATIVA</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1> LISTA DE BICIS OPERATIVAS </h1>
    <p>
        <?= mostrartablabicis($tabla); ?>
    </p>
    <?php if (isset($biciRecomendada)) : ?>
        <h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
        <button onclick="history.back()"> Volver </button>
    <?php else : ?>
        <p> Indique su posición: </p>
        <form>
            Coordx <input type="number" name="coordx" value="<?= isset($_GET['coordx']) ? $_GET['coordx'] : '' ?>"><br>
            Coordy <input type="number" name="coordy" value="<?= isset($_GET['coordy']) ? $_GET['coordy'] : '' ?>"><br>
            <input type="submit" value=" Enviar ">
        </form>
    <?php endif ?>
</body>

</html>
