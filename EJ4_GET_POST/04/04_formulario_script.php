<!DOCTYPE html>
<html lang="es">
<!-- 
4. Elaborar el  formulario siguiente (04. html) y 
procesar los datos enviados que un script php
 (04.php) que muestres los valores recibidos 
 según el siguiente formato:
-->

<?php
$nombre      = $_REQUEST['nombre']      ?? '';
$clave       = $_REQUEST['contrasena']       ?? '';
$semaforo    = $_REQUEST['color']    ?? 'Sin elegir';
$anio        = $_REQUEST['estudios']        ?? '';
$comentarios = $_REQUEST['comentarios'] ?? '';

$publicidad = isset($_REQUEST['publicidad']) ? 'Con publicidad' : 'Sin publicidad';

$ciudades = $_REQUEST['ciudades'] ?? [];

$idiomas = $_REQUEST['idiomas'] ?? [];


$idiomasTexto = is_array($idiomas) ? implode(', ', $idiomas) : $idiomas;

$ciudadesTexto = '';
foreach ($ciudades as $ciudad) {
    $ciudadesTexto .= $ciudad . ' ';
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4 - Form script</title>

    <style>
        h1 {
            margin: 0;
            width: 400px;
            padding: 22px 10px;
            background: #0000ff;
            color: #fff;
            font-size: 28px;
            text-align: center;
            text-shadow: 2px 2px 3px #000;
        }
    </style>
</head>

<body>
    <h1>Procesando formulario</h1>
    <div class="datos">
        Nombre: <?= htmlspecialchars($nombre) ?><br>
        Clave: <?= htmlspecialchars($clave) ?><br>
        Semáforo: <?= htmlspecialchars($semaforo) ?><br>
        Publicidad: <?= $publicidad ?><br>
        Idiomas: <?= htmlspecialchars($idiomasTexto) ?><br>
        Año de fin de estudios: <?= htmlspecialchars($anio) ?><br>
        Lista de las ciudades: <?= htmlspecialchars($ciudadesTexto) ?><br>
        Comentarios: <?= htmlspecialchars($comentarios) ?>
    </div>
</body>

</html>